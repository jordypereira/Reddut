@if (count($errors))
  <div class="alert alert-warning alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error}}</li>
      @endforeach
    </ul>
  </div>
@endif
