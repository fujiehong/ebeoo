<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\VerificationCodeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Overtrue\EasySms\EasySms;

class VerificationCodesController extends Controller
{
    public function store(VerificationCodeRequest $request,EasySms $easySms)
    {
        $phone=$request->phone;
        //生成4位验证码

        if (!app()->environment('production')){
            $code='1234';
        }
        else{
            $code = str_pad(random_int(1, 9999), 4, 0, STR_PAD_LEFT);
            try{
                $result=$easySms->send($phone,[
                    'template'=>config('easysms.gateways.aliyun.templates.register'),
                    'data'=>[
                        'name'=>'尊敬的用户：',
                        'code'=>$code
                    ],
                ]);

            }catch (\Overtrue\EasySms\Exceptions\NoGatewayAvailableException $exception){
                $message = $exception->getException('aliyun')->getMessage();
                return $this->response->errorInternal($message?:'短信发送异常');

            }

        }

        $key = 'verificationCode_'.Str::random(15);
        $expiredAt = now()->addMinutes(5);
        // 缓存验证码 5 分钟过期。
        \Cache::put($key, ['phone' => $phone, 'code' => $code], $expiredAt);

        if(!app()->environment('production')){
            session()->flash('success', '手机验证码为1234');
        }else{
            session()->flash('success', '手机验证码已发送');
        }



    }
}
