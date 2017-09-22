<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Post $post)
    {
      // simple form input validation
      $this->validate(request(), ['body'=>'required|min:2']);

      // the long form method
      //Comment::create([
      //  'body' => request('body'),
      //  'post_id' => $post->id
      //]);

      // or let post save the comments instead
      $post->addComment(request('body'));

      // another form of re-direct to last page
      return back();
    }
}
