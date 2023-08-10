@if ($this->project->media->count())
    <div>
        <div class="rounded-xl shadow-sm overflow-hidden object-cover object-center">
            {{ Str::of($this->project->media[0]->toHtml())->toHtmlString() }}
        </div>
    </div>
@endif
