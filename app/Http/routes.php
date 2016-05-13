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

/*Route::get('/home', function () {
    return view('welcome');
});*/

Route::get('/','IndexController@index');

Route::auth();

Route::group(['middleware'=>'auth'], function(){

    Route::get('/home', function () {
        return view('users.articles.articles');
    });

    Route::resource('posts', 'PostsController',
        ['only' => ['index','store','update','destroy']]
    );

});