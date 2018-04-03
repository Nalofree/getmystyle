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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/profile/{id}', 'UserController@edit');
Route::post('/profile/save', 'UserController@save');
Route::get('/company', ['uses' => 'CompanyController@edit','as' => '/company']);
Route::post('/company/add', 'CompanyController@add');
Route::post('/company/save', 'CompanyController@save');
Route::get('/projects', 'ProjectController@show');
Route::get('/projects/showcurrent/{id}', 'ProjectController@showCurrent');
Route::post('/projects/add', 'ProjectController@add');
Route::get('/projects/edit/{id}', 'ProjectController@edit');
Route::post('/projects/save/{id}', 'ProjectController@save');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('register/confirm/{token}', 'Auth\RegisterController@confirmEmail');

