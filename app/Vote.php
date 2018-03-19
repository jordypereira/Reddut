<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
  protected $fillable = ['user_id', 'post_id', 'reply_id', 'comment_id'];

  public function post()
  {
    return $this->belongsTo('App\Post');
  }

  public function comment()
  {
    return $this->belongsTo('App\Comment');
  }

  public function reply()
  {
    return $this->belongsTo('App\Reply');
  }

}
