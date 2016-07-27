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

Route::auth();
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/rappels', 'HomeController@reminders');
Route::get('/photos', 'HomeController@photographies');
Route::get('/articles', 'HomeController@posts');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function()
{
    Route::get('/', 'AdminController@index');
    Route::resource('reminders', 'RemindersController');
    Route::resource('sections', 'SectionsController');
    Route::resource('photographies', 'PhotographiesController');
    Route::resource('news', 'PostsController');
});
