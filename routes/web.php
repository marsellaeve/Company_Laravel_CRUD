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
    return view('login');
});

Route::get('/login','App\Http\Controllers\AuthController@login')->name('login');
Route::post('/postlogin','App\Http\Controllers\AuthController@postlogin');
Route::get('/logout','App\Http\Controllers\AuthController@logout');
Route::post('/signup','App\Http\Controllers\AuthController@signup');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/','App\Http\Controllers\DashboardController@index');
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');
    Route::get('/film', 'App\Http\Controllers\FilmController@index');
    Route::post('/film/create','App\Http\Controllers\FilmController@create');
    Route::get('/film/{id}/edit','App\Http\Controllers\FilmController@edit');
    Route::post('/film/{id}/update','App\Http\Controllers\FilmController@update');
    Route::get('/film/{id}/delete','App\Http\Controllers\FilmController@delete');
    Route::get('/film/{id}/detail','App\Http\Controllers\FilmController@detail');

});
