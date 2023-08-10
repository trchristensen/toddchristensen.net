@extends('layouts.app')

@section('content')
    <div class="w-full max-w-3xl mx-auto">
        <div class="p-6">
            <h2 class="font-bold text-2xl mb-8 tracking-tighter">Projects</h2>
            <p class="prose prose-neutral dark:prose-invert mb-4">Here's a stack of my mostly unfished work!</p>
        </div>
        @livewire('projects.list-projects')
    </div>
@endsection
