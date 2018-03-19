<div class="row">
  <div class="col-md-offset-1 col-md-11">
      <div class="row">
        <div class="col-md-1 flex-center">
          @include('../partials/votes', ['id' => $reply->id, 'score' => $reply->score, 'name' => 'comments'])
        </div>
        <div class="col-md-2 line-right">
          <p>{{ $reply->user->name }}</p>
          <p>{{ Carbon\Carbon::parse($reply->created_at)->format('d-m-Y H:i') }}</p>
        </div>
        <div class="col-md-8">
          <p>{{ $reply->body }}</p>
        </div>
        {{-- EDIT & DELETE --}}
        @include('../partials/showEditDeleteButtons', ['id' => $reply->id, 'name' => $reply->user->name, 'link' => 'comments'])


      </div>
  </div>
</div>
{{-- INSERT REPLY --}}
<div class="row">
  <div class="col-md-offset-4 col-md-7">

    @if (Auth::check())
      <form action="{{ url('/posts/reply/' . $reply->id) }}" method="post">
          {{ csrf_field() }}
            <div class="input-group">
              <input type="text" class="form-control" id="body" name="body" placeholder="Enter reply on Comment">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit">Reply</button>
              </span>
            </div>
      </form>
    @endif

  </div>
  <div class="col-md-1">

  </div>
</div> {{-- END ROW --}}
@foreach ($reply->children as $reply)
  @include('../partials/showReplies2')
@endforeach
