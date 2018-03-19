<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePost;
use App\Post;
use App\Comment;
use Auth;
use DB;

class PostsController extends Controller
{
  public function index()
  {
    $posts = Post::where('stickyTime', null)->orderBy('score', 'DESC')->get();

    $stickies = Post::whereNotNull('stickyTime')->orderBy('stickyTime', 'DESC')->get();

    return view('posts.index', compact('posts', 'stickies'));
  }

  public function sortIndex($sort)
  {
    $posts = Post::where('stickyTime', null)->orderBy($sort, 'DESC')->get();

    $stickies = Post::whereNotNull('stickyTime')->orderBy('stickyTime', 'DESC')->get();

    return view('posts.index', compact('posts', 'stickies'));
  }
  public function show(Post $post)
  {
    $comments = $post->comments;

    return view('posts.show', compact('post', 'comments'));
  }

//edit
  public function editPost(Post $post)
  {
    $comments = $post->comments;
    if (Auth::check() && (Auth::user()->isAdmin || $post->user->name == Auth::user()->name)) {
      return view('posts.editPost', compact('post', 'comments'));
    }else{
      return back();
    }
  }

  public function update(Request $request, Post $post)
  {


    if (Auth::check() && (Auth::user()->isAdmin || $post->user->name == Auth::user()->name))
    {

      $post->update($request->All());
      return redirect('/posts/' . $post->id);
    }

    return back();
  }

  public function sticky(Request $request, Post $post)
  {
    if (Auth::check() && Auth::user()->isAdmin)
    {
      if ($post->stickyTime == null) {
        $post->stickyTime = date('Y-m-d H:i:s');
      }
      else {
        $post->stickyTime = null;
      }
      $post->save();
    }

    return back();
  }

  public function delete(Post $post)
  {
    if (Auth::check() && (Auth::user()->isAdmin || $post->user->name == Auth::user()->name))
    {
      $post->delete();
    }

    return redirect('/posts');
  }

  public function addComment(Request $request, Post $post)
  {
    $this->validate($request, [
      'body' => 'required'
    ]);

    if (Auth::check())
    {
      Auth::user()->comments()->create(['post_id' => $post->id, 'body' => $request->input('body')]);
    }

    return redirect('/posts/' . $post->id);

  }

  public function addPost(CreatePost $request)
  {
    if (Auth::check())
    {
      Auth::user()->posts()->create($request->all());
    }

    return back();
  }

  public function upvote(Post $post)
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
