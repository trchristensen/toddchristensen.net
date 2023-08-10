@extends('layouts.app')

@section('content')
    <style>
        @media(prefers-color-scheme: dark) {
            .bg-dots {
                background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(200,200,255,0.15)'/%3E%3C/svg%3E");
            }
        }

        @media(prefers-color-scheme: light) {
            .bg-dots {
                background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,50,0.10)'/%3E%3C/svg%3E")
            }
        }
    </style>


    <div class="w-full max-w-3xl mx-auto">
        <section id="intro">
            <div class="p-6">
                <h1 class="font-bold text-4xl mb-8 tracking-tighter">Heyyaaa, I'm Todd! 👋🏽</h1>
                <p class="prose prose-neutral dark:prose-invert mb-4">I don't usually talk like that. I'm just doing what
                    every other dev does on their portfolio site.. I'm an unemployed (by choice) web developer. I enjoy
                    pretending I'm going to launch one of my many side projects! Check out
                    some of them below...</p>
            </div>
        </section id="projects">

        <section>
            <div class="p-6">
                <h2 class="font-bold text-2xl mb-8 tracking-tighter">Projects</h2>
                <p class="prose prose-neutral dark:prose-invert mb-4">I'm currently working on a few projects that I'm
                    excited
                    about. I'll be posting updates here as I make progress.</p>
            </div>

            <div
                class="grid rounded-xl overflow-hidden shadow-sm border bg-white dark:bg-gray-900  [&>*:nth-child(even)]:bg-gray-50 [&>*:nth-child(even)]:dark:bg-white/5">
                @foreach ($projects as $project)
                    <div class="pt-2 pb-3 px-4 border-b">
                        <div class="flex w-full justify-between">
                            <h3 class="font-semibold mb-2">{{ $project->name }}</h3>
                            <span
                                class="text-sm {{ $project->status === 'in_progress' ? 'italic' : '' }}">{{ $project->readable_status }}</span>
                        </div>
                        <p class="text-sm">{{ $project->description }}</p>
                    </div>
                @endforeach
            </div>
            {{-- @livewire('list-projects') --}}
        </section>

        <section id="writing">
            <div class="p-6">
                <h2 class="font-bold text-2xl mb-8 tracking-tighter">Writing</h2>
                <p class="prose prose-neutral dark:prose-invert mb-4">I just started a writing section to write down
                    whatever
                    I
                    feel
                    like sharing-- From tech I'm into at the time to random thoughts.</p>
            </div>

            <div
                class="grid rounded-xl overflow-hidden shadow-sm border bg-white dark:bg-gray-900  [&>*:nth-child(even)]:bg-gray-50 [&>*:nth-child(even)]:dark:bg-white/5">
                @foreach ($posts as $post)
                    <div class="pt-2 pb-3 px-4 border-b">
                        <div class="flex w-full justify-between">
                            <h3 class="font-semibold mb-2">{{ $post->title }}</h3>
                            <span
                                class="text-sm {{ $post->created_at }}</span>
                        </div>
                        <p class="text-sm">{{ $post->description }}
                                </p>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- @livewire('list-posts') --}}
            <div class="p-6 text-right">
                <a href="{{ route('post.index') }}">
                    view all posts
                </a>
            </div>
        </section>
    </div>
@endsection
