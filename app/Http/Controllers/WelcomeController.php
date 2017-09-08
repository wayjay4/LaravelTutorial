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

      return view('welcome', compact('name', 'age', 'tasks'));
    }

    public function about()
    {
        return view('about');
    }
}
