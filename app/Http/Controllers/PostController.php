<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
      // GET '/posts'

      return view('posts.index');
    }

    public function create()
    {
      // GET '/posts/create'

      return view('posts.create');
    }

    public function store()
    {
      // POST '/posts'

      // our tasks here are:
      // -create a new post using the request data
      // -save it to the database
      // -then redirect to the homepage

      // dumps value to display (json)
      //dd(request()->all());
      //dd(request('title'));
      //dd(request('body'));
      //dd(request(['title', 'body']));

      // -create a new post using the request data
      // on way of  declaring a new app post from another name space:
      //$post = new \App\Post;
      // or because we added 'use App\Post' to beginning of file we can use:
      //$post = new Post;
      //$post->title = request('title');
      //$post->body = request('body');

      // -save it to the database
      //$post->save();

      // or we can do both steps of -create and -save with the following:
      //Post::create([
      //  'title' => request('title'),
      //  'body' => request('body')
      //]);
      // or this way:
      Post::create(request(['title', 'body']));

      // -then redirect to the posts homepage
      return redirect('/posts');
    }

    public function show($id)
    {
      // GET '/posts'

      return view('posts.show');
    }

    public function edit($id)
    {
      // GET '/posts/id'
    }

    public function update($id)
    {
      // PATCH '/posts/id'
    }

    public function destroy($id)
    {
      // DELETE '/posts/id'
    }
}
