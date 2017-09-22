<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  // use this to say that we are okay with mass assigning the following input fields
  protected $fillable = ['title', 'body'];
  // or for those we do not want to allow mass assigning we use the following:
  //protected $guarded = ['user_id'];

  public function comments()
  {
    // the two method calls below are identical, just called in different ways
    return $this->hasMany('App\Comment');
    //return $this->hasMany(Comment::class);
  }

  public function addComment($body)
  {
    // the long form method
    //Comment::create([
    //  'body' => request('body'),
    //  'post_id' => $this->id
    //]);

    // or we can use the relationship that posts has with comments
    // where behind the scenes the post and comment id's are being used
    //$this->comments()->create(['body' => $body]);
    $this->comments()->create(compact('body'));

  }
}
