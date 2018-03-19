<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
  use SoftDeletes;

  protected $fillable = ['title', 'link', 'body', 'score','stickyTime'];
  protected $dates = ['deleted_at'];

  public function comments()
  {
    return $this->hasMany('App\Comment');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function addComment(Comment $comment)
  {
    return $this->comments()->save($comment);
  }
}
