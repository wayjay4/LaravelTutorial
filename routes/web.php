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
Route::get('/posts', 'PostController@index')->name('home');

Route::get('/posts/create', 'PostController@create');

Route::post('/posts', 'PostController@store');

Route::get('/posts/{post}', 'PostController@show');

Route::post('/posts/{post}/comments', 'CommentsController@store');

// adding authentication
Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create');

Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');

// for resources like this you typically need:
// -Eloquent Model => Post
// -controller => Posts
// -migration => create_posts_table

// third part of tutorial: practing creating a model, contoller, and migration

Route::get('/albums', 'AlbumController@index');
