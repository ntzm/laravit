@extends('template')

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">{{ $user->username }}</div>
        <div class="panel-body">
            Joined {{ $user->created_at->diffForHumans() }}
        </div>
    </div>
    @each('partials.post', $posts, 'post')
@endsection
