<form @if (Auth::check())action="{{ url('/' . $name . '/' . $id . '/upvote')}}"method="post"@endif>
    {{ csrf_field() }}

    <button type="submit" name="button" class="no-btn glyphicon glyphicon-chevron-up"></button>
</form>
Score: {{ $score }}
<form @if (Auth::check())action="{{ url('/' . $name . '/' . $id . '/downvote')}}" method="post"@endif>
    {{ csrf_field() }}

    <button type="submit" name="button" class="no-btn glyphicon glyphicon-chevron-down"></button>
</form>
