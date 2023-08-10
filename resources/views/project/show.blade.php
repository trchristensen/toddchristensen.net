@extends('layouts.app')

@section('content')
    <div class="w-full max-w-3xl mx-auto">
        <div class="p-6">
            @livewire('projects.view-project', [
                'project' => $project,
            ])
        </div>
    @endsection
