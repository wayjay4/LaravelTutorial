<?php
namespace App\Repositories;

use App\Post;
use App\Redis;

class Posts
{
  protected $redis;

  // if our class has other dependicies, we use a constructor to set them
  // for this example we are creating a mock dependicy with 'redis'
  public function __construct(Redis $redis)
  {
    $this->redis = $redis;
  }

  public function all()
  {
    return Post::all();
  }
}

?>
