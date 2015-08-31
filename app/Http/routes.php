<?php

get('/', ['as' => 'index', 'uses' => 'HomeController@index']);

Route::group(['prefix' => 'user', 'as' => 'users.'], function () {
    get('{username}', ['as' => 'show', 'uses' => 'UserController@show']);
});

Route::group(['prefix' => 'sub', 'as' => 'subs.'], function () {
    get('create', ['as' => 'create', 'uses' => 'SubController@create']);
    post('create', ['as' => 'store', 'uses' => 'SubController@store']);
    get('{name}', ['as' => 'show', 'uses' => 'SubController@show']);
    get('{subName}/post/{slug}', ['as' => 'posts.show', 'uses' => 'PostController@show']);
});

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    get('login', ['as' => 'getLogin', 'uses' =>'Auth\AuthController@getLogin']);
    post('login', ['as' => 'postLogin', 'uses' => 'Auth\AuthController@postLogin']);
    get('logout', ['as' => 'getLogout', 'uses' => 'Auth\AuthController@getLogout']);
    get('register', ['as' => 'getRegister', 'uses' => 'Auth\AuthController@getRegister']);
    post('register', ['as' => 'postRegister', 'uses' => 'Auth\AuthController@postRegister']);
});
