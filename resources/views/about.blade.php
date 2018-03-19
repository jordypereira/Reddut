@extends('layout')

@section('title')
  About
@endsection

@section('content')

  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">About</div>

                  <div class="panel-body">
                      I'm an aspiring Web/App Developer.
                  </div>
              </div>
              <div class="panel panel-default">
                  <div class="panel-heading">Features</div>

                  <div class="panel-body">
                      <h4>Users</h4>
                      <ul>
                        <li>Make, edit and delete own Posts</li>
                        <li>Make, edit and delete own Comments</li>
                        <li>Upvote Posts and Comments</li>
                      </ul>
                      <h4>Admins</h4>
                      <ul>
                        <li>Make, pin/unpin, edit and delete all Posts</li>
                        <li>Make, edit and delete all Comments</li>
                        <li>Upvote Posts and Comments</li>
                      </ul>
                      <h4>Global</h4>
                      <ul>
                        <li>Must have an account to make posts, comments or vote</li>
                        <li>Sticky Posts at top of index. Ordered by Newest</li>
                      </ul>
                      <h4>To-do</h4>
                      <ul>
                        <li>Give notifications when making a Post or Comment</li>
                        <li>Customize Profile</li>
                        <li>Change reactions on Comments exterior</li>
                        <li>Sort posts</li>
                      </ul>
                      <p><a href="{{ url('/suggestions/') }}">Suggest a feature</a></p>
                  </div>
              </div>
          </div>
      </div>
  </div>

@endsection
