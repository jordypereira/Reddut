@extends('layout')

@section('navbar')
  <a class="navbar-brand" href="{{ url('/posts') }}">Terug naar Posts</a>

@endsection
@section('content')
  <h2>{{ $post->title }}</h2>
  <i>{{ $post->user->name }}</i>

  <hr>
  @include('../partials/alerts')
  
  <div class="well well-lg">
        <form class="form-horizontal" action="{{ url('/posts/' . $post->id) }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PATCH">
            <div class="form-group">
              <label class="control-label col-sm-2" for="title">Title:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{ $post->title }}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="link">Link:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="link" name="link" placeholder="Enter link if you want" value="{{ $post->link }}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="body">Body:</label>
              <div class="col-sm-10">
                <textarea name="body" id="body" class="form-control" >{{ $post->body }}</textarea>
              </div>
            </div>
            <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">Update Post</button>
            </div>
            </div>
        </form>
  </div>

    {{-- VIEW COMMENTS --}}

      <h1>Comments</h1>

      @include('../partials/showComments')
      <hr>




@endsection
