<!doctype html>
<html lang="bg">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Студио Грация | Дамяна Стайкова</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{--font awsome--}}
    {{--<script src="https://kit.fontawesome.com/4787c0013c.js" crossorigin="anonymous"></script>--}}
</head>
<body>
<div id="app"></div>
<!-- Vue -->
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
