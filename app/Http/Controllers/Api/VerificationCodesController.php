<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\Api\VerificationCodeRequest;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Mews\Captcha\Facades\Captcha;
use Overtrue\EasySms\EasySms;
use Overtrue\EasySms\Exceptions\NoGatewayAvailableException;

class VerificationCodesController extends Controller
{
    public function store(VerificationCodeRequest $request,EasySms $easySms)
    {

        $captchaData=Cache::get($request->captcha_key);

        if (!$captchaData) {
            abort(403, '图片验证码已失效');
        }
        //调用Captcha函数检验用户提交的验证码是否正确。
        //这里注意的是，判断的顺序不能错，前面的是用户输入的验证码，后面是缓存中记录的Key
        if (!Captcha::check_api($request->captcha_code,$captchaData['captcha'])){

            //验证码错误就清除

            Cache::forget($request->captcha_key);
            throw new AuthenticationException('验证码错误');
        }

        $phone=$request->phone;

        if (!app()->environment('production')) {
            $code = '1234';
        } else {
            // 生成4位随机数，左侧补0
            $code = str_pad(random_int(1, 9999), 4, 0, STR_PAD_LEFT);

            try {
                $result = $easySms->send($phone, [
                    'template' => config('easysms.gateways.aliyun.templates.register'),
                    'data' => [
                        'name' => $phone,
                        'code' => $code
                    ],
                ]);
            } catch (NoGatewayAvailableException $exception) {
                $message = $exception->getException('aliyun')->getMessage();
                abort(500, $message ?: '短信发送异常');
            }
        }

        $key = 'verificationCode_'.Str::random(15);
        $expiredAt=now()->addMinutes(5);
        Cache::put($key, ['phone' => $phone, 'code' => $code], $expiredAt);
        return response()->json([
            'key' => $key,
            'expired_at' => $expiredAt->toDateTimeString(),
        ])->setStatusCode(201);



    }

}
