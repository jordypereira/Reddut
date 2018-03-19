@extends('layout')

@section('title')
  Posts
@endsection

@section('content')
  @if (Auth::check())
    <h1>Start een nieuwe post</h1>

    @include('../partials/alerts')


{{-- MAKE POST --}}
      <form class="form-horizontal" action="posts" method="POST">

        {{ csrf_field() }}

        <div class="form-group">
          <label class="control-label col-sm-2" for="title">Title:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{ old('title') }}">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="link">Link:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="link" name="link" placeholder="Enter link if you want" value="{{ old('link') }}">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="body">Body:</label>
          <div class="col-sm-10">
            <textarea name="body" id="body" class="form-control" placeholder="Enter body">{{ old('body') }}</textarea>
          </div>
        </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Make Post</button>
        </div>
      </div>
    </form>
  @else
    <div class="alert alert-warning">
      Make an account or log in to make posts or comments.
    </div>
  @endif

<hr>
{{-- STICKY --}}
@if ($stickies)
  @foreach ($stickies as $sticky)
    <div class="well sticky">
      <div class="row">
        <div class="col-md-2 flex-center">
          @include('../partials/votes', ['id' => $sticky->id, 'score' => $sticky->score, 'name' => 'posts'])
        </div>
        <div class="col-md-9">
          @if ($sticky->link != '' )
            <a href="{{ $sticky->link }}"><h3>{{ $sticky->title }}</h3></a>
          @else
            <h3>{{ $sticky->title }}</h3>
          @endif
          <a class="post" href="{{ url('/posts/' . $sticky->id) }}">
            <p>reacties: {{ count($sticky->comments) }}</p>
            <p>{{ Carbon\Carbon::parse($sticky->created_at)->format('d-m-Y H:i') }} by <i>{{ $sticky->user->name}}</i></p>
          </a>
        </div>

        @include('../partials/showEditDeleteButtonsPost', ['id' => $sticky->id, 'name' => $sticky->user->name])


      </div>
    </div>
  @endforeach

@endif


{{-- POSTS --}}

  <h1>Alle Posts</h1>
  <p><a href="{{ url('/posts/sort/score') }}">Sort by popularity</a> | <a href="{{ url('/posts/sort/created_at') }}">Sort by date</a></p>
  @foreach ($posts as $post)
    <div class="well post">
      <div class="row">
        <div class="col-md-2 flex-center">
          @include('../partials/votes', ['id' => $post->id, 'score' => $post->score, 'name' => 'posts'])
        </div>
        <div class="col-md-9">
          @if ($post->link != '' )
            <a href="{{ $post->link }}"><h3>{{ $post->title }}</h3></a>
          @else
            <h3>{{ $post->title }}</h3>
          @endif
          <a class="post" href="{{ url('/posts/' . $post->id) }}">
            <p>reacties: {{ count($post->comments) }}</p>
            <p>{{ Carbon\Carbon::parse($post->created_at)->format('d-m-Y H:i') }} by <i>{{ $post->user->name}}</i></p>
          </a>
        </div>

        @include('../partials/showEditDeleteButtonsPost', ['id' => $post->id, 'name' => $post->user->name])

      </div>
    </div>

  @endforeach
@endsection
