<div class="flex flex-col w-full gap-10">
    <div>
        <form wire:submit="create">
            {{ $this->form }}

            <button type="submit">
                Submit
            </button>
        </form>
    </div>
    <div>

        {{ $this->table }}
    </div>
</div>
