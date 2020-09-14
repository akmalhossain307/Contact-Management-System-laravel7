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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/','contactController@index')->name('home');


Route::prefix('contact')->group(function () {
    Route::get('/create','ContactController@create')->name('create');
    Route::post('/store','ContactController@store')->name('store');
    Route::get('/edit/{id}','ContactController@edit')->name('contact.edit');
    Route::post('/update/{id}','ContactController@update')->name('contact.update');
    Route::get('/destroy/{id}','ContactController@destroy')->name('contact.destroy');
});