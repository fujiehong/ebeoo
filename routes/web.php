<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//本地化en,zh-CN
Route::get('welcome/{locale}', function ($locale) {
    App::setLocale($locale);
    //dd(App::getLocale());


    //
});

Route::get('/lang', 'PagesController@lang')->name('lang');

Route::get('/', 'PagesController@root')->name('root');
Route::get('/stemtoys', 'PagesController@stemtoys')->name('stemtoys');
Route::get('/posts', 'PostsController@index')->name('posts.index');
Route::get('/products', 'ProductsController@index')->name('products');
Route::get('/about', 'PagesController@about')->name('about');

//SBB
Route::get('/sbb', 'SBB\PagesController@root')->name('sbb');
Route::get('/sbb/partners', 'SBB\PagesController@partners')->name('partners');
Route::get('/sbb/club', 'SBB\PagesController@club')->name('club');
Route::get('/sbb/products', 'SBB\ProductsController@index')->name('sbb.products.all');
Route::get('/sbb/collections/{productCategory}', 'SBB\ProductCategoriesController@show')->name('collections');
Route::get('/sbb/collections', 'SBB\ProductCategoriesController@collections')->name('productcategories');
Route::get('/sbb/collection/cubes', 'SBB\ProductCategoriesController@cubes')->name('cubes');
Route::get('/sbb/products/{product}', 'SBB\ProductsController@show')->name('sbb.products.show');
Route::get('/sbb/blogs/{blogCategory}', 'SBB\BlogCategoriesController@show')->name('sbb.blogs.show');
Route::get('/sbb/blogs/builds/{blog}/{slug?}', 'SBB\BlogsController@show')->name('sbb.builds.show');
Route::get('/sbb/blogs', 'SBB\BlogCategoriesController@all')->name('sbb.blogs.all');



//Route::get('/', 'PagesController@root')->name('root')->middleware('verified');
//Auth::routes();
Route::get('products/{product}', 'ProductsController@show')->name('products.show');
Route::get('posts/{post}', 'PostsController@show')->name('posts.show');



// 用户身份验证相关的路由
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// 用户注册相关路由
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// 密码重置相关路由
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Email 认证相关路由
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');


//user个人中心
Route::resource('users','UsersController',['only' => ['show', 'update', 'edit']]);

Route::resource('topics', 'TopicsController', ['only' => ['index', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::get('topics/{topic}/{slug?}', 'TopicsController@show')->name('topics.show');
//分类
Route::resource('categories','CategoriesController',['only'=>['show']]);

//topic上传图片
Route::post('upload_image', 'TopicsController@uploadImage')->name('topics.upload_image');

Route::post('uploadKindeditorImage', 'TopicsController@uploadKindeditorImage')->name('topics.uploadKindeditorImage');
//replies回复
Route::resource('replies', 'RepliesController', ['only' => ['store', 'destroy']]);
//notification通知
Route::resource('notifications', 'NotificationsController', ['only' => ['index']]);
//关注与取消关注
Route::post('/users/followers/{user}', 'FollowersController@store')->name('followers.store');
Route::delete('/users/followers/{user}', 'FollowersController@destroy')->name('followers.destroy');

Route::get('/users/{user}/followings', 'UsersController@followings')->name('users.followings');
Route::get('/users/{user}/followers', 'UsersController@followers')->name('users.followers');

//商品
//Route::resource('product','ProductsController',['only'=>['index','show']]);


// 微信开发平台登录
Route::group(['middleware' => 'web'], function () {
    Route::get('redirect/driver/{driver}', 'AuthorizationsController@redirectToProvider');

    Route::get('callback/driver/{driver}', 'AuthorizationsController@handleProviderCallback');

    Route::get('getAccessToken/driver/{driver}', 'AuthorizationsController@getAccessToken');
});




Route::any('/wechat', 'WeChatController@serve');
