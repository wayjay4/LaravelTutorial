<?php

namespace App\Http\Controllers;

use App\Hobby;   // used to import the class Hobby, so we can use a shortened ref to Hobby

class HobbyController extends Controller
{
    public function index()
    {
      $hobbies = Hobby::latest()->get();

      return view('hobbies/index', compact('hobbies'));
    }

    public function show($id)
    {
      $hobby = Hobby::find($id);  // using eloquent, using name space

      //dd($hobby); // dispays json contents by default

      return view('hobbies/show', compact('hobby'));
    }
}
