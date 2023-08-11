@if ($image->count())
    <div>
        <div class="object-cover object-center overflow-hidden shadow-sm rounded-xl">
            {{ Str::of($image[0]->toHtml())->toHtmlString() }}
        </div>
    </div>
@endif
