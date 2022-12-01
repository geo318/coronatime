
<div class="relative">
    <span>{{ config('languages')[app()->currentLocale()] }}</span>
    <div class="absolute top-0 hidden">
        <ul>
            @foreach (config('languages') as $lang => $language)
                @if(app()->currentLocale() !== $lang)
                    <li>{{ $language }}</li>
                @endif
            @endforeach
        </ul>
    </div>
</div>
