<div class="col-md-1 flex-center">
  @if (Auth::check() && (Auth::user()->isAdmin || $name == Auth::user()->name))
    <form action="{{ url('/' . $link . '/' . $id . '/edit') }}" method="post">
      {{ csrf_field() }}

        <button type="submit" name="button" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i></button>
    </form><br>
    <form action="{{ url('/' . $link . '/' . $id) }}" method="post">
      {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">

        <button type="submit" name="button" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>
    </form>
  @endif
</div>
