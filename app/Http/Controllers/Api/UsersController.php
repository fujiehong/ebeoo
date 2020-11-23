<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\Api\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UsersController extends Controller
{
    public function store(UserRequest $request)
    {
        //通过请求中的key,从cache里换取出信息。
        $verifyData=Cache::get($request->verification_key);
        if (!$verifyData){
            abort(403,'验证码已失效');
        }

        if (!hash_equals($verifyData['code'],$request->verification_code)){
            // 返回401
            throw new AuthenticationException('验证码错误');

        }

        $user=User::create([
            'name'=>$request->name,
            'phone'=>$verifyData['phone'],
            'password'=>$request->password,
        ]);
        //清除cache里对应的验证码信息。
        Cache::forget($request->verification_key);

        return new UserResource($user);
    }

    public function getUserInfo(Request $request)
    {
        //$user = $request->user();
        $session_key=Cache::get($user->id);
        $miniProgram = app('wechat.mini_program');
        $decryptedData = $miniProgram->encryptor->decryptData($session_key, $request->iv, $request->encryptedData);

        if(!$user->weixin_unionid){

            $user->weixin_unionid=$decryptedData['unionId'];
            $user->save();


        }

        return  new UserResource($user);
    }


    public function show(User $user, Request $request)
    {
        return new UserResource($user);
    }

    public function me(Request $request)
    {
        //dd($request->user());
        return (new UserResource($request->user()))->showSensitiveFields();
    }
}
