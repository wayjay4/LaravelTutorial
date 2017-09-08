<?php

namespace App\Http\Controllers;

use App\Hobby;   // used to import the class Hobby, so we can use a shortened ref to Hobby

class WelcomeController extends Controller
{
    public function index()
    {
      $name = 'World';
      $age = 41;
      $tasks = [
        'Go to the store',
        'Get some gas',
        'Make some lunch'
      ];

      // get data from database
      $hobbies = Hobby::all();  // using eloquent, using name space

      return view('welcome', compact('name', 'age', 'tasks', 'hobbies'));
    }

    public function about()
    {
        return view('about');
    }
}
