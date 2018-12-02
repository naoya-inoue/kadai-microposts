@if (Auth::user()->is_favorite($micropost->id))
    {!! Form::open(['route' => ['user.un_fav', $micropost->id], 'method' => 'delete']) !!}
        {!! Form::submit('Unfavorite', ['class' => "btn btn-success btn-xs"]) !!}
    {!! Form::close() !!}
    @else
    {!! Form::open(['route' => ['user.add_fav', $micropost->id]]) !!}
        {!! Form::submit('Favorite', ['class' => "btn btn-default btn-xs"]) !!}
    {!! Form::close() !!}
@endif