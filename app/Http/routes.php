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
    put('{subName}/post/{slug}/vote/{type}', ['as' => 'posts.vote', 'uses' => 'PostController@vote']);
    post('{subName}/post/{slug}/comment', ['as' => 'posts.comments.store', 'uses' => 'CommentController@store']);
    get('{subName}/submit', ['as' => 'posts.create', 'uses' => 'PostController@create']);
    post('{subName}/submit', ['as' => 'posts.store', 'uses' => 'PostController@store']);
});

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    get('login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
    post('login', ['as' => 'postLogin', 'uses' => 'Auth\AuthController@postLogin']);
    get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
    get('register', ['as' => 'register', 'uses' => 'Auth\AuthController@getRegister']);
    post('register', ['as' => 'postRegister', 'uses' => 'Auth\AuthController@postRegister']);
});
