<header>
    <div class="flex flex-row justify-between items-center pt-16 pb-16 max-w-3xl mx-auto">
        <div>
        </div>
        <nav>
            <ul class="flex flex-row gap-8 font-normal">
                <li>
                    <a wire:navigate href="{{ route('home') }}"
                        class="{{ Route::currentRouteName() == 'home' ? 'active-link' : '' }}">home</a>
                </li>
                <li>
                    <a wire:navigate href="{{ route('project.index') }}"
                        class="{{ Route::currentRouteName() == 'project.index' ? 'active-link' : '' }}">projects</a>
                </li>
                <li>
                    <a wire:navigate href="{{ route('post.index') }}"
                        class="{{ Route::currentRouteName() == 'post.index' ? 'active-link' : '' }}">blog</a>
                </li>

            </ul>
        </nav>
    </div>
</header>
