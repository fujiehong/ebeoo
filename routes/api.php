<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->namespace('Api')->name('api.v1.')->group(function() {

    //登录相关频率限制一分钟调用 10 次
    Route::middleware('throttle:' . config('api.rate_limits.sign'))
        ->group(function () {

            // 图片验证码应用在调用短信接口中。
            Route::post('captchas', 'CaptchasController@store')
                ->name('captchas.store');
            // 短信验证码
            Route::post('verificationCodes', 'VerificationCodesController@store')
                ->name('verificationCodes.store');
            // 用户注册
            Route::post('users', 'UsersController@store')
                ->name('users.store');
            // 第三方登录
            Route::post('socials/{social_type}/authorizations', 'AuthorizationsController@socialStore')
                //只支持微信
                ->where('social_type', 'wechat')

                //支持微信及微博 ->where('social_type', 'wechat|weibo')
                ->name('socials.authorizations.store');
            // 微信小程序登录
            Route::post('weapplogin','AuthorizationsController@weappLogin')
                ->name('api.authorizations.weapplogin');
            Route::get('weappuserinfo','AuthorizationsController@weappUserInfo')
                ->name('api.authorizations.weappuserinfo');
            //登录
            Route::post('authorizations', 'AuthorizationsController@store')
                ->name('api.authorizations.store');


            // 刷新token
            Route::put('authorizations/current', 'AuthorizationsController@update')
                ->name('authorizations.update');
            // 删除token
            Route::delete('authorizations/current', 'AuthorizationsController@destroy')
                ->name('authorizations.destroy');
        });
    //访问相关频率限制一分钟调用60次
    Route::middleware('throttle:' . config('api.rate_limits.access'))
        ->group(function () {
            // 游客可以访问的接口

            //商品列表
            Route::get('products','ProductsController@index')->name('products.index');
            Route::get('products/{product}','ProductsController@show')->name('products.show');
            Route::get('productcategories','ProductCategoriesController@index')->name('productcategories.index');
            Route::get('posts','PostsController@index')->name('posts.index');
            Route::get('topics','TopicsController@index')->name('topics.index');


            // 某个用户的详情
            Route::get('users/{user}', 'UsersController@show')
                ->name('users.show');


            Route::get('categories','CategoriesController@index')->name('categories.index');


            // 登录后可以访问的接口
            //Route::middleware('auth:api')->group(function() {
            Route::middleware('token.canrefresh')->group(function() {
                // 当前登录用户信息
                Route::get('user', 'UsersController@me')
                    ->name('user.show');
                Route::get('getuserinfo', 'UsersController@getUserInfo')
                    ->name('user.getuserinfo');

            });

        });






});




