<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      // this listens for when the archives sidebar is loaded into a view
      // and 'provides' the needed archives data by binding it to that view

      // two ways of doing this
      // first way:
      //\View::composer();
      // second way: a helper function
      view()->composer('layouts.posts.sidebar', function ($view){
        $view->with('archives', \App\Post::archives());
      });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
