<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('/logout', 'HomeController@logout');

Route::group(['prefix' => 'users', 'middleware' => ['auth']], function () {
    Route::get('/', 'UsersController@index');
    Route::get('/create', 'UsersController@create');
    Route::post('/', 'UsersController@store');
    Route::get('/{id}', 'UsersController@edit');
    Route::post('/{id}', 'UsersController@update');
    Route::get('/delete/{id}', 'UsersController@delete');
});

Route::group(['prefix' => 'roles', 'middleware' => ['auth']], function () {
    Route::get('/', 'RolesController@index');
    Route::get('/create', 'RolesController@create');
    Route::post('/', 'RolesController@store');
    Route::get('/{id}', 'RolesController@edit');
    Route::post('/{id}', 'RolesController@update');
    Route::get('/delete/{id}', 'RolesController@delete');
});