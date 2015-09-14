@extends('template')

@section('content')
    @include('post.partials.posts', compact('posts'))
@endsection
