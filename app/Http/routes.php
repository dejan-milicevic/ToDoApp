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

Route::get('/', [
    'middleware' => 'auth',
    'uses' => 'UsersController@home'
]);

Route::get('/login', [
    'middleware' => 'guest',
    'uses' => 'UsersController@login'
]);

Route::get('/login', [
    'middleware' => 'guest',
    'uses' => 'UsersController@login'
]);

Route::get('/logout', 'UsersController@logout');

Route::post('authenticate', 'UsersController@authenticate');

Route::resource('/users', 'UsersController');

Route::group(['middleware' => 'auth'], function()
{
    Route::resource('/api/todos', 'TodosController');
});
