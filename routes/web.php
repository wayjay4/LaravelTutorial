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

// first part of tutorial: introduction to welcome and creating Hobby

Route::get('/', 'WelcomeController@index');

Route::get('/about', 'WelcomeController@about');

Route::get('/hobbies', 'HobbyController@index');

Route::get('/hobbies/{hobbies}', 'HobbyController@show');

// second part of tutorial: creating Blog
Route::get('/posts', 'PostController@index');

Route::get('/posts/{post}', 'PostController@show');

// for resources like this you typically need:
// -Eloquent Model => Post
// -controller => Posts
// -migration => create_posts_table
