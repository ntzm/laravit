<?php

get('/', ['as' => 'index', 'uses' => 'HomeController@index']);

Route::group(['prefix' => 'user', 'as' => 'users.'], function () {
    get('{username}', ['as' => 'show', 'uses' => 'UserController@show']);
});

Route::group(['prefix' => 'sub', 'as' => 'subs.'], function () {
    get('{name}', ['as' => 'show', 'uses' => 'SubController@show']);
    get('{subName}/post/{slug}', ['as' => 'posts.show', 'uses' => 'PostController@show']);
});
