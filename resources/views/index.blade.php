@extends('template')

@section('content')
    @each('partials.post', $posts, 'post')
@endsection
