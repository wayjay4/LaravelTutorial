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

use App\Hobby;   // used to import the class Hobby, so we can use a shortened ref to Hobby

Route::get('/', 'WelcomeController@index');

Route::get('/about', 'WelcomeController@about');

Route::get('/hobbies', 'HobbyController@index');

Route::get('/hobbies/{hobbies}', 'HobbyController@show');
