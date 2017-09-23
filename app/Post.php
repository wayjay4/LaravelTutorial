<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
  // use this to say that we are okay with mass assigning the following input fields
  protected $fillable = ['title', 'body', 'user_id'];
  // or for those we do not want to allow mass assigning we use the following:
  //protected $guarded = ['user_id'];

  public function comments()
  {
    // the two method calls below are identical, just called in different ways
    return $this->hasMany('App\Comment');
    //return $this->hasMany(Comment::class);
  }

  public function user()
  {
    // with this you can call call the following:
    //$comment->post->user

    return $this->belongsTo(User::class);
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

  // using query scope to filter
  public function scopeFilter($query, $filters)
  {
    // if a request month and year exist, then filter it out of posts
    // note: this is a WHERE CLAUSE in SQL
      if(isset($filters['month']) && $month = $filters['month']) :
        $query->whereMonth('created_at', Carbon::parse($month)->month);
      endif;
      
      if(isset($filters['year']) && $year = $filters['year']) :
        $query->whereYear('created_at', $year);
      endif;
  }
}
