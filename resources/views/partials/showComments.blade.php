@foreach ($comments as $comment)
    {{-- SHOW COMMENT IF PARENT ID = 0 --}}
    @if ($comment->parent_id == 0)
    <div class="well well-md">
      <div class="row">
        <div class="col-md-1 flex-center">

          @include('../partials/votes', ['id' => $comment->id, 'score' => $comment->score, 'name' => 'comments'])

        </div>
        <div class="col-md-2 line-right">
          <p>{{ $comment->user->name }}</p>
          <p>{{ Carbon\Carbon::parse($comment->created_at)->format('d-m-Y H:i') }}</p>
        </div>
        <div class="col-md-8">
          <p>{{ $comment->body }}</p>
        </div>

        {{-- EDIT & DELETE --}}
        @include('../partials/showEditDeleteButtons', ['id' => $comment->id, 'name' => $comment->user->name, 'link' => 'comments'])


      </div>
      {{-- INSERT REPLY --}}
      <div class="row">
        <div class="col-md-offset-3 col-md-8">

          @if (Auth::check())
            <form action="{{ url('/posts/reply/' . $comment->id) }}" method="post">
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

    {{-- SHOW REPLIES --}}
    @foreach ($comment->children as $reply)
      @include('../partials/showReplies')
    @endforeach


  </div>
  @endif
@endforeach
