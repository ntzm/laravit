@extends('template')

@section('content')
    @include('partials.posts', compact('posts'))
@endsection
