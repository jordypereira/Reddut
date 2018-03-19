<div class="row">
  <div class="col-md-offset-3 col-md-9">
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
