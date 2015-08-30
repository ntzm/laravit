<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

get('/', ['as' => 'index', 'uses' => 'HomeController@index']);

Route::group(['prefix' => 'user', 'as' => 'users.'], function () {
    get('{username}', ['as' => 'show', 'uses' => 'UserController@show']);
});

Route::group(['prefix' => 'sub', 'as' => 'subs.'], function () {
    get('{name}', ['as' => 'show', 'uses' => 'SubController@show']);
    Route::group(['prefix' => 'post', 'as' => 'posts.'], function () {
        get('{id}', ['as' => 'show', 'uses' => 'PostController@show']);
    });
});
