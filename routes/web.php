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

Route::get('/', function () {
    $name = 'World';
    $age = 41;
    $tasks = [
      'Go to the store',
      'Get some gas',
      'Make some lunch'
    ];

    // get data from database
    //$hobbies = DB::table('hobbies')->get(); // one way: using query builder
    //$hobbies = App\Hobby::all();  // another better way: using eloquent
    $hobbies = Hobby::all();  // another better way: using eloquent, using name space

    return view('welcome', compact('name', 'age', 'tasks', 'hobbies'));
});

Route::get('/about', function(){
  return view('about');
});

Route::get('/hobbies', function(){
  $hobbies = DB::table('hobbies')->latest()->get();

  return  view('hobbies/index', compact('hobbies'));
});

Route::get('/hobbies/{hobbies}', function($id){
  //$hobby = DB::table('hobbies')->find($id); // one way: using query builder
  //$hobby = App\Hobby::find($id);  // another better way: using eloquent
  $hobby = Hobby::find($id);  // another better way: using eloquent, using name space

  //dd($hobby); // dispays json contents by default

  return view('hobbies/show', compact('hobby'));
});
