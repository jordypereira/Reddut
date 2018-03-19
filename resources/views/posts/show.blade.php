@extends('layout')

@section('title')
  {{ $post->title }}
@endsection

@section('navbar')
  <a class="navbar-brand" href="{{ url('/posts') }}">Terug naar Posts</a>

@endsection
@section('content')

{{-- POST --}}

  @if ($post->link !== '')
    <a href="{{ $post->link }}"><h3>{{ $post->title }}</h3></a>
  @else
    <h2>{{ $post->title }}</h2>
  @endif

    <i>{{ $post->user->name }}</i>

  <hr>
  <div class="well well-lg post">
    <div class="row">
      <div class="col-md-2 flex-center">

        @include('../partials/votes', ['id' => $post->id, 'score' => $post->score, 'name' => 'posts'])

      </div>

      <div class="col-md-9">
        <p>{{ $post->body }}</p>
      </div>

      @include('../partials/showEditDeleteButtons', ['id' => $post->id, 'name' => $post->user->name, 'link' => 'posts'])

    </div>
  </div>
  <hr>



{{-- PLACE COMMENT --}}

  @if (Auth::check())
    <h3>Voeg een comment toe:</h3>

    @include('../partials/alerts')

    <form class="form-horizontal" action="{{ url('/posts/' . $post->id . '/comment') }}" method="post">


        {{ csrf_field() }}

      <div class="form-group">
        <label class="control-label col-sm-2" for="body">Comment:</label>
        <div class="col-sm-10">
          <textarea name="body" class="form-control" placeholder="Enter comment">{{ old('body') }}</textarea>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Add Comment</button>
        </div>
      </div>

    </form>
    <hr>
  @else
    <div class="alert alert-warning">
      Make an account or log in to post a comment.
    </div>
  @endif

{{-- VIEW COMMENTS --}}

  <h1>Comments</h1>

  @include('../partials/showComments')

  <hr>




@endsection
