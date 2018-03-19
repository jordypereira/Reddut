<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Comment;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Comment::deleting(function($comment){
          $children = $comment->children;
          foreach ($children as $child) {
            $child->delete();
          }
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
