<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'UserController@index'); //User List

//User Add
Route::post('/add','UserController@addUser');

//User Edit
Route::post('/edit','UserController@showEditForm');
Route::post('/edit-complete','UserController@editUser');

//User delete
Route::post('/delete-confirm','UserController@deleteConfirm');
Route::post('/delete-complete','UserController@deleteUser');
