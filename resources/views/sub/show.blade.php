@extends('template')

@section('title', $sub->name)

@section('content')
    @include('post.partials.posts', ['posts' => $sub->posts])
@endsection
