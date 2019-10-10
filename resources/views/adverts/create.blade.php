<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Baldininkams') }}</title>

    <!-- Styles -->
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">--}}
    <link href="{{ asset('css/main/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main/semantic.min.css') }}" rel="stylesheet">

</head>
<body>

<div id="top-nav-bar">
</div>

<div class="ui content">
    <div class="">
        <p>Create new advert</p>
            </div>
</div>
<script src="{{ asset('js/main/main.js') }}" defer></script>
</body>
</html>
