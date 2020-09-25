<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\Api\AuthorizationRequest;
use App\Http\Requests\Api\SocialAuthorizationRequest;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Overtrue\Socialite\AccessToken;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Overtrue\LaravelSocialite\Socialite;


class AuthorizationsController extends Controller
{
    //用户名密码登录
    public function store(AuthorizationRequest $request)
    {
        $username=$request->username;
        //判断username是不是邮件地址。
        filter_var($username, FILTER_VALIDATE_EMAIL) ?
            $credentials['email'] = $username :
            $credentials['phone'] = $username;

        $credentials['password'] = $request->password;


        if (!$token = Auth::guard('api')->attempt($credentials)) {
            throw new AuthenticationException('用户名或密码错误');
        }

        return $this->respondWithToken($token)->setStatusCode(201);


    }
    //第三方登录
    public function socialStore($type,SocialAuthorizationRequest $request)
    {
        $driver=Socialite::driver($type);


        try{


            if ($code=$request->code)
            {
                $accessToken=$driver->getAccessToken($code);

            }else {
                $tokenData['access_token'] = $request->access_token;
                if ($type == 'wechat') {
                    $tokenData['openid'] = $request->openid;
                }
                $accessToken = new AccessToken($tokenData);

            }

            $oauthUser = $driver->user($accessToken);
        }catch (\Exception $e){
            throw new AuthenticationException('参数错误，未获取用户信息');
        }

        switch ($type) {
            case 'wechat':
                $unionid = $oauthUser->getOriginal()['unionid'] ?? null;

                if ($unionid) {
                    $user = User::where('weixin_unionid', $unionid)->first();
                } else {
                    $user = User::where('weixin_openid', $oauthUser->getId())->first();
                }

                // 没有用户，默认创建一个用户
                if (!$user) {
                    $user = User::create([
                        'name' => $oauthUser->getNickname(),
                        'avatar' => $oauthUser->getAvatar(),
                        'weixin_openid' => $oauthUser->getId(),
                        'weixin_unionid' => $unionid,
                    ]);
                }
                $token = Auth::guard('api')->login($user);


                break;
        }


        return $this->respondWithToken($token)->setStatusCode(201);
    }
    //微信小程序登录login.因为有的用户无法在获取到union_id所以。此函数不创建用户记录。
    public function weappLogin(Request $request)
    {
        $code=$request->code;
        //根据code获取微信openid和session_key;
        //$miniProgram = \EasyWeChat::miniProgram();
        $miniProgram = app('wechat.mini_program');
        //获取微信服务器的session_key和openid
        $data=$miniProgram->auth->session($code);



        $expires_in=auth('api')->factory()->getTTL() * 60;

        Cache::put($data['openid'], $data['session_key'], $expires_in);

        return  response()->json([
            'openid' => $data['openid']

        ]);
    }
    //微信小程序通过getUserInfo解密后，可以取得unionid，则生成用户记录。
    public function weappUserInfo(Request $request)
    {
        $session_key=Cache::get($request->openid);
        $miniProgram = app('wechat.mini_program');
        $decryptedData = $miniProgram->encryptor->decryptData($session_key, $request->iv, $request->encryptedData);
        $unionid=$decryptedData['unionId'] ?? null;
        if($unionid){
            $user = User::where('weixin_unionid', $decryptedData['unionId'])->first();
            if (!$user) {
                $user = User::create([
                    'name'=>$decryptedData['nickName'],
                    'avatar'=>$decryptedData['avatarUrl'],
                    'weixin_openid' => $decryptedData['openId'],
                    'weixin_unionid'=>$decryptedData['unionId']
                ]);
            }
            //登录换取token令牌。


        }
        $token = Auth::guard('api')->login($user);
        return  $this->respondWithToken($token)->setStatusCode(200);


    }



    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }


    public function update()
    {
        $token = auth('api')->refresh();
        return $this->respondWithToken($token);
    }

    public function destroy()
    {
        auth('api')->logout();
        return response(null, 204);
    }
}
