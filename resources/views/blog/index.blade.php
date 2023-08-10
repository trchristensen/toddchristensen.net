@extends('layouts.app')

@section('content')
    <div class="w-full max-w-3xl mx-auto">
        <div class="p-6">
            <h2 class="font-bold text-2xl mb-8 tracking-tighter">Writing</h2>
            <p class="prose prose-neutral dark:prose-invert mb-4">I just started a writing section to write down
                whatever
                I
                feel
                like sharing-- From tech I'm into at the time to random thoughts.</p>
        </div>
        @livewire('posts.list-posts')
    </div>
@endsection
