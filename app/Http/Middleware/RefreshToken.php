<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class RefreshToken extends BaseMiddleware
{
    /**
     * JWT无感刷新设计，客户端携带登录的token。由服务器检测是否过期。如果过期且已过刷新时间。则返回告知客户端重新登录。
     * 如果token已过期，但仍在刷新时间内。则由服务器直接刷新token,然后将本次请求返回值和新的token返回给客户端。
     * 客户端需要将新的token存储。在下次请求中，需要使用新token
     *
     * 如果刷新成功。需要客户端判断服务器返回的header中Authorization的中是否存在，如果存在则需要更换保存新的token，同时本次请求的正常。
     * 如果刷新不成功，会抛出异常。客户端会收到statusCode=401，且会收到相应错误信息。
     *
     * code=101 为Unauthorized为身份认证错误（重新登录）。
     * code=102 为其它错误，具体错误信息看反馈信息（重新登录）。
     * code=103 Token has expired and can no longer be refreshed 令牌过期且无法再刷新（重新登录）
     *
     * code=102会出现的错误信息：
     *                  Token Signature could not be verified.无法验证令牌签名。
     *                  Token has expired 令牌过期。但没有进入blacklist所以可以再刷新。（重新登录）
     *                  The token has been blacklisted 令牌已在黑名单中，此令牌不可再用。（重新登录）
     * code=103会出现的错误信息：
     *                  Token has expired and can no longer be refreshed 令牌过期且无法再刷新（重新登录）
     *                  The token has been blacklisted 令牌已在黑名单中，此令牌不可再用。（重新登录）
     *                      出现这种情况是刷新了令牌但客户端没有保存使用。仍旧使用旧令牌导致。
     *
     *
     * 注意：返回statusCode=401则说明token出现的问题，客户端采取的方式，就是需要重新请求登录。
     *
     * 设计说明：JWT操作token的时候，会先用中间件判断是否过期。如果过期会直接抛出异常。所以在设计无感刷新的时候，则原$next($request)中的
     *          值会因为中断后，置为null。这点需要注意。所以为了保证本次请求有效。则Auth::login($user, false);
     *
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|mixed
     * @throws JWTException
     */
    public function handle($request, Closure $next)
    {
        //检查此次请求中是否带有$token，如果没有则抛出异常。
        $this->checkForToken($request);


        // 使用 try 包裹，以捕捉 token 过期所抛出的 TokenExpiredException  异常
        try{

            //检测用户的登录状态，如果正常则通过
            if ($this->auth->parseToken()->authenticate()){

                return $next($request);

            }else{

                return response()->json([
                    'code'   => 101, // means auth error in the api,
                    'message' => 'Unauthorized' // nothing to show
                ]);

            }


            // 检测用户的登录状态，如果不正常则抛出异常。
            //throw new UnauthorizedHttpException('jwt-auth', '未登录');

        }

        catch (TokenExpiredException $exception){

            // 此处捕获到了 token 过期所抛出的 TokenExpiredException 异常，我们在这里需要做的是刷新该用户的 token 并将它添加到响应头中
            try{

                // 刷新用户的 token
                $token=$this->auth->refresh();
                //因为原token已经被刷新失效，所以为了保证这次请求有效，所以将新刷新的token赋予此用户。
                $user =$this->auth->setToken($token)->toUser();



            }catch (JWTException $exception){
                return response()->json([
                    'code'   => 103 ,//, means not refreshable,
                    'message' => $exception->getMessage() // nothing to show
                ]);

                // 如果捕获到此异常，即代表 refresh 也过期了，用户无法刷新令牌，需要重新登录。
                //throw new UnauthorizedHttpException('jwt-auth',$exception->getMessage());

            }


        }
        catch (JWTException $exception)
        {
            return response()->json([
                'code'   => 102 ,//, means auth error in the api,
                'message' => $exception->getMessage() // nothing to show
            ]);
        }




        //登录用户实例以供全局使用（很重要，因为异常后，$next($request)返回为空，无法将本次请求完成，通过这样的登录方式保证后继操作完成。）
         Auth::login($user, false);

        // 在响应头中返回新的 token

        return $this->setAuthenticationHeader($next($request),$token);

    }
}
