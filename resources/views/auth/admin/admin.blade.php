<!doctype html>
<html lang="bg" class="page admin">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Админ | Студио Грация </title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/admin/admin.css') }}" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    {{--font awsome--}}
    {{--<script src="https://kit.fontawesome.com/4787c0013c.js" crossorigin="anonymous"></script>--}}
</head>
<body>
<div>
    {{--HEADER--}}
    @include('auth.admin.includes.header')
    @yield('content')
</div>
</body>
</html>
