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

//Route::get('/', 'UsersController@home');
Route::get('/', [
    'middleware' => 'auth',
    'uses' => 'UsersController@home'
]);

Route::get('/login', [
    'middleware' => 'guest',
    'uses' => 'UsersController@login'
]);

Route::get('/logout', 'UsersController@logout');

Route::post('authenticate', 'UsersController@authenticate');

//Route::get('users', 'UsersController@index');

//Route::get('/users/create', 'UsersController@create');

//Route::post('/users/store', 'UsersController@store');

Route::resource('/users', 'UsersController');

Route::resource('/api/todos', 'TodosController');
