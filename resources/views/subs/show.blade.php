@extends('template')

@section('title', $sub->name)

@section('content')
    @include('partials.posts', compact('posts'))
@endsection
