<div class="col-md-1 flex-center">
  @if (Auth::check() && (Auth::user()->isAdmin || $name == Auth::user()->name))
    @if (Auth::user()->isAdmin)
      <form action="{{ url('/posts/' . $id . '/sticky') }}" method="post">
        {{ csrf_field() }}

          <button type="submit" name="button" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pushpin"></i></button>
      </form><br>
    @endif
    <form action="{{ url('/posts/' . $id . '/edit') }}" method="post">
      {{ csrf_field() }}

        <button type="submit" name="button" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i></button>
    </form><br>
    <form action="{{ url('/posts/' . $id) }}" method="post">
      {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">

        <button type="submit" name="button" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>
    </form>
  @endif
</div>
