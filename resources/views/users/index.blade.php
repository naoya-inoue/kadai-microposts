@extends('layouts.app')

@section('content')
    @include('users.users', ['uses' => $users])
@endsection