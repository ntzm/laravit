@extends('template')

@section('title', $user->username)

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4>{{ $user->username }}</h4>
        </div>
        <div class="panel-body">
            Joined {{ $user->created_at->diffForHumans() }}
        </div>
    </div>
    @include('partials.posts', ['posts' => $user->posts])
@endsection
