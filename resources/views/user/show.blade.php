@extends('template')

@section('title', $user->username)

@section('content')
    <div class="card card-block card-primary card-inverse">
        <h4 class="card-title">{{ $user->username }}</h4>
        <div class="card-text">
            Joined {{ $user->created_at->diffForHumans() }}
        </div>
    </div>
    @include('post.partials.posts', compact('posts'))
@endsection
