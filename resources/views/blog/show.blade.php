@extends('layouts.app')

@section('content')
    <div class="w-full max-w-3xl mx-auto">
        <div class="p-6">
            @livewire('posts.view-post', [
                'post' => $post,
            ])
        </div>
    @endsection
