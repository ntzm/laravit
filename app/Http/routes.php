<?php

// General
get('/', 'HomeController@index')->name('index');

// Users
$router->group([
    'prefix' => 'user',
], function () use ($router) {

    get('{username}', 'UserController@show')->name('user.show');

});

// Subs
$router->group([
    'prefix' => 'sub',
], function () use ($router) {

    get('create', 'SubController@create')->name('sub.create');
    post('create', 'SubController@store')->name('sub.store');
    get('{name}', 'SubController@show')->name('sub.show');
    get('{subName}/submit', 'PostController@create')->name('sub.post.create');
    post('{subName}/submit', 'PostController@store')->name('sub.post.store');

    // Posts
    $router->group([
        'prefix' => '{subName}/post/{slug}',
    ], function () use ($router) {

        get('/', 'PostController@show')->name('sub.post.show');
        put('vote/{type}', 'PostController@vote')->name('sub.post.vote');
        post('comment', 'CommentController@store')->name('sub.post.comment.store');

    });

});

// Auth
$router->group([
    'prefix' => 'auth',
    'namespace' => 'Auth',
], function () use ($router) {

    get('login', 'AuthController@getLogin')->name('auth.login');
    post('login', 'AuthController@postLogin')->name('auth.postLogin');
    get('logout', 'AuthController@getLogout')->name('auth.logout');
    get('register', 'AuthController@getRegister')->name('auth.register');
    post('register', 'AuthController@postRegister')->name('auth.postRegister');

});

// Misc
get('images/previews/{publicId}.jpg', function ($publicId) {
    // Doesn't deserve its own controller... yet
    return Storage::get('images/previews/'.$publicId.'.jpg');
});
