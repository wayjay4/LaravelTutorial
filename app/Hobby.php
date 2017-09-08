<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    // example1: this way it is a wrapper for a query statement
    public static function incomplete()
    {
      return static::where('complete', 0)->get();
    }

    // example2: this way it is a wrapper for a query statement
    // AND we can pass additional query values/statements
    public function scopeComplete($query)
    {
      return $query->where('complete', 1);
    }
}
