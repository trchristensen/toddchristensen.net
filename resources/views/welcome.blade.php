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


    <div class="w-full max-w-3xl pb-20 mx-auto">
        <section id="intro">
            <div class="grid grid-cols-1 gap-4 p-6 md:grid-cols-3">
                <div class="md:col-span-1">
                    <div class="w-full mt-2 overflow-hidden rounded-xl">
                        <img src="{{ public_path('static/meandfam-c.jpg') }}" alt="me and the fam" />
                    </div>
                </div>
                <div class="md:col-span-2">
                    <h1 class="flex flex-wrap gap-4 mb-8 text-4xl font-bold tracking-tighter"><span>Yo.</span> <span>I'm Todd
                            Christensen.</span>
                        <span>👋🏽</span>
                    </h1>
                    <p class="mb-4 prose prose-neutral dark:prose-invert">Welcome to my site! I'm an unemployed (by choice)
                        web
                        developer. Actually, I'm an aspring #solopreneuer. I enjoy
                        pretending I'm going to launch one of my many side projects! I've been living in the Philippines for
                        5 years where I started a family. As of Sept 2023 I am back in the Bay Area, CA. Anyway, check out
                        my stuff below!</p>
                    <ul class="list-none">
                        <li><a class="flex items-center transition-all hover:text-neutral-800 dark:hover:text-neutral-100"
                                rel="noopener noreferrer" target="_blank" href="https://x.com/christensen_tr"><svg
                                    width="12" height="12" viewBox="0 0 12 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.07102 11.3494L0.963068 10.2415L9.2017 1.98864H2.83807L2.85227 0.454545H11.8438V9.46023H10.2955L10.3097 3.09659L2.07102 11.3494Z"
                                        fill="currentColor"></path>
                                </svg>
                                <p class="ml-2 h-7">follow me on x</p>
                            </a></li>
                    </ul>
                </div>
            </div>
        </section>

        <section id="projects">
            <div class="p-6">
                <h2 class="mb-8 text-2xl font-bold tracking-tighter">Projects</h2>
                <p class="mb-4 prose prose-neutral dark:prose-invert">I'm currently working on a few projects that I'm
                    excited
                    about. I'll be posting updates here as I make progress.</p>
            </div>

            <div class="px-1">
                <div
                    class="grid rounded-xl overflow-hidden shadow-sm border bg-white dark:bg-gray-900  [&>*:nth-child(even)]:bg-gray-50 [&>*:nth-child(even)]:dark:bg-white/5">
                    @foreach ($projects as $project)
                        <div class="px-4 pt-2 pb-3 border-b">
                            <div class="flex justify-between w-full">
                                <h3 class="mb-2 font-semibold">{{ $project->name }}</h3>
                                <span
                                    class="text-sm {{ $project->status === 'in_progress' ? 'italic' : '' }}">{{ $project->readable_status }}</span>
                            </div>
                            <p class="text-sm">{{ $project->description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- @livewire('list-projects') --}}
            <div class="p-6 text-right underline">
                <a href="{{ route('project.index') }}">
                    check out more projects
                </a>
            </div>
        </section>

        <section id="writing">
            <div class="p-6">
                <h2 class="mb-8 text-2xl font-bold tracking-tighter">Writing</h2>
                <p class="mb-4 prose prose-neutral dark:prose-invert">I just started a writing section to write down
                    whatever
                    I
                    feel
                    like sharing-- From tech I'm into at the time to random thoughts.</p>
            </div>

            <div class="px-1">
                <div
                    class="grid rounded-xl overflow-hidden shadow-sm border bg-white dark:bg-gray-900  [&>*:nth-child(even)]:bg-gray-50 [&>*:nth-child(even)]:dark:bg-white/5">
                    @foreach ($posts as $post)
                        <div class="px-4 pt-2 pb-3 border-b">
                            <div class="flex justify-between w-full gap-4">
                                <h3 class="mb-2 font-semibold">{{ $post->title }}</h3>
                                <span class="text-sm italic"> {{ $post->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-sm">{{ $post->excerpt }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- @livewire('list-posts') --}}
            <div class="p-6 text-right underline">
                <a href="{{ route('post.index') }}">
                    check out more posts
                </a>
            </div>
        </section>
    </div>
@endsection
