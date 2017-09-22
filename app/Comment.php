<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // use this to say that we are okay with mass assigning the following input fields
    //protected $fillable = ['title', 'body'];
    // or for those we do not want to allow mass assigning we use the following:
    protected $guarded = [];

    public function post()
    {
      return $this->belongsTo(Post::class);
    }
}
