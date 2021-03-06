<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('products', ProductsController::class);
    $router->resource('posts', PostsController::class);
    $router->resource('users', UserController::class);
    $router->resource('blogs', BlogsController::class);
    $router->resource('blog-replies', BlogRepliesController::class);

});
