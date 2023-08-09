@extends('layouts.base')



@section('body')
    <div
        class="relative min-h-screen bg-gray-100 bg-center  bg-dots dark:bg-gray-900 selection:bg-indigo-500 selection:text-white">

        @include('layouts.header')
        @yield('content')

        @isset($slot)
            {{ $slot }}
        @endisset
    </div>
@endsection
