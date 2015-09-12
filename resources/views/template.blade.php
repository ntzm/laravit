<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Laravit is a link-sharing community built with Laravel">
    <title>@yield('title', 'Laravit') | Laravit</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('head')
</head>
<body>
@include('partials.navigation')
<div class="container-fluid">
    @yield('content')
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
