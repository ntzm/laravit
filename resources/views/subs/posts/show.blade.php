@extends('template')

@section('content')
    @include('partials.post', compact('post'))
    <h2>Comments</h2>
    @include('partials.comments', compact('comments'))
@endsection
