<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Reply;
use Auth;
use DB;

class VotesController extends Controller
{
  public function vote($table, $vote)
  {
    $voted = DB::table('votes')->where([
      ['user_id', Auth::user()->id],
      ['post_id', $post->id]
    ])->get()->first();

      if ($voted && $voted->vote == "downvote")
      {
        DB::table('votes')
          ->where('id', $voted->id)
          ->update(['vote' => 'upvote']);

        $post->update(['score' => ($post->score + 2)]);
      }
      elseif($voted)
      {
        DB::table('votes')
          ->where('id', $voted->id)
          ->delete();

        $post->update(['score' => ($post->score - 1)]);
      }
      else
      {
        DB::table('votes')->insert(
            ['user_id' => Auth::user()->id,
            'post_id' => $post->id,
            'vote' => 'upvote']);

        $post->update(['score' => ($post->score + 1)]);
      }

    return back();
  }
  public function downvote(Post $post)
  {
    $voted = DB::table('votes')->where([
      ['user_id', Auth::user()->id],
      ['post_id', $post->id]
    ])->get()->first();

      if ($voted && $voted->vote == "upvote")
      {
        DB::table('votes')
          ->where('id', $voted->id)
          ->update(['vote' => 'downvote']);

        $post->update(['score' => ($post->score - 2)]);
      }
      elseif($voted)
      {
        DB::table('votes')
          ->where('id', $voted->id)
          ->delete();

        $post->update(['score' => ($post->score + 1)]);
      }
      else
      {
        DB::table('votes')->insert(
            ['user_id' => Auth::user()->id,
            'post_id' => $post->id,
            'vote' => 'downvote']);

        $post->update(['score' => ($post->score - 1)]);
      }

    return back();
  }
}
