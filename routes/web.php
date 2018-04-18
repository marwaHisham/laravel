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

Auth::routes();
$id=$_GET;
Route::get('/check','HomeController@index');
Route::get('/home', 'EmployeeController@index')->name('home');
Route::get('/create', 'EmployeeController@create')->name('create');
Route::post('/store', 'EmployeeController@store')->name('store');
Route::post('/update', 'EmployeeController@update')->name('update');
Route::get('/map',function(){
    return view('map');
});

Route::resource('employees','EmployeeController');
