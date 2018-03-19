<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
  use SoftDeletes;

  protected $fillable = ['post_id', 'parent_id', 'body', 'score'];
  protected $dates = ['deleted_at'];  


  public function post()
  {
    return $this->belongsTo('App\Post');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function parent()
  {
      return $this->belongsTo('App\Comment', 'parent_id');
  }

  public function children()
  {
      return $this->hasMany('App\Comment', 'parent_id');
  }
}
