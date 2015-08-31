@extends('template')

@section('title', $post->title)

@section('content')
    @include('partials.post', compact('post'))
    <h2>Comments</h2>
    @include('partials.comments', ['comments' => $post->comments])
@endsection
