<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @hasSection('title')
        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <meta name="description"
        content="This is the online web presence of Todd Christensen. No, not the great, former NFL player for the Raiders. This is the great web developer and solopreneuer, Todd Christensen, from Foster City, CA.">

    <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">


    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles
    @vite('resources/sass/app.scss')
</head>

<body class="antialiased">
    @yield('body')

    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
