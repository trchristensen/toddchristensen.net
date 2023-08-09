<header>
    <div class="flex flex-row justify-between items-center pt-16 pb-16 max-w-5xl mx-auto">
        <div>
        </div>
        <nav>
            <ul class="flex flex-row gap-8 font-bold">
                <li>
                    <a wire:navigate href="{{ route('home') }}">home</a>
                </li>
                <li>
                    <a wire:navigate href="{{ route('post.index') }}">blog</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
