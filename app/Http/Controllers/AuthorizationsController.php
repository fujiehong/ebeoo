<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Overtrue\LaravelSocialite\Socialite;

class AuthorizationsController extends Controller
{
    //微信开放平台.使用微信身份登录WEB网站.
    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function handleProviderCallback($driver) {
        $user =  Socialite::driver($driver)->user();
        dd($user);
    }

    //微信公众号.使用微信公众平台登录.
    public function getAccessToken($driver)
    {
       $aa=Socialite::driver($driver);
       dd($aa);
    }

}
