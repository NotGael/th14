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
Route::get('/photo/{id}', 'HomeController@photography', function ($id){});

Route::get('/articles', 'HomeController@posts');
Route::get('/sections', 'HomeController@sections');

Route::group(['middleware' => ['auth', 'admin'], 'namespace' => 'Admin', 'prefix' => 'admin'], function()
{
    Route::get('/', ['as' => 'admin.index', 'uses' => 'AdminController@index']);
    Route::resource('rappels', 'RemindersController');
    Route::resource('sections', 'SectionsController');
    Route::resource('photos', 'PhotographiesController');
    Route::resource('articles', 'PostsController');
    Route::resource('users', 'UsersController');
    Route::resource('calendrier', 'EventsController');
});

Route::group(['middleware' => ['auth'], 'namespace' => 'User', 'prefix' => 'user'], function()
{
    Route::get('/', ['as' => 'user.index', 'uses' => 'UserController@index']);
    Route::resource('address', 'AddressController');
    Route::resource('photography', 'PhotographyController');
});
