<?php

namespace App\Http\Controllers;

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
