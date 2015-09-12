@extends('template')

@section('title', $sub->name)

@section('content')
    @include('partials.posts', ['posts' => $sub->posts])
@endsection
