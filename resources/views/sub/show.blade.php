@extends('template')

@section('title', $sub->name)

@section('content')
    @include('post.partials.posts', compact('posts'))
@endsection
