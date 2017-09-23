<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;

class PostController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth')->except(['index', 'show']);
  }

  public function index()
  {
    // GET '/posts'

    // fetch all posts
    //$posts = Post::all();
    //$posts = Post::oldest()->get();
    //$posts = Post::orderBy('created_at', 'asc')->get();
    //$posts = Post::latest()->get();
    $posts = Post::orderBy('created_at', 'desc');

    // if a request month and year exist, then filter it out of posts
    // note: this is a WHERE CLAUSE in SQL
    if($month = request('month')) :
      $posts->whereMonth('created_at', Carbon::parse($month)->month);
    endif;

    if($year = request('year')) :
      $posts->whereYear('created_at', $year);
    endif;

    // then fetch the post
    $posts = $posts->get();

    $archives = Post::selectRaw('year(created_at) as year, monthname(created_at) as month, count(*) as published')
      ->groupBy('year', 'month')
      ->orderByRaw('min(created_at) desc')
      ->get()
      ->toArray();

    return view('posts.index', compact('posts', 'archives'));
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
    // - validate the request data being posted
    // -create a new post using the request data
    // -save it to the database
    // -then redirect to the homepage

    // dumps value to display (json)
    //dd(request()->all());
    //dd(request('title'));
    //dd(request('body'));
    //dd(request(['title', 'body']));

    // - validate the request data being posted
    // this tries to validate and if anything fails it will redirect you to
    // the previous page to correct the errors that is populated in an errors variable
    $this->validate(request(), [
      'title' => 'required',
      'body' => 'required'
    ]);

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
    //Post::create([
    //  'title' => request('title'),
    //  'body' => request('body'),
    //  'user_id' => auth()->id()
    //]);
    // or we could do it this way, by giving the responsibiity to the User class to make publish the post
    auth()->user()->publish(
      new Post(request(['title', 'body']))
    );

    // -then redirect to the posts homepage
    return redirect('/posts');
  }

  public function show(Post $post)
  {
    // GET '/posts'

    // we are using 'wrap model binding' so we do not need the direct call below
    // get post data from database
    //$post = POST::find($id);

    return view('posts.show', compact('post'));
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
