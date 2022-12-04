
<div class="relative">
    <span class="trigger hover:cursor-pointer">{{ config('languages')[app()->currentLocale()] }}</span>
    <div 
        class="drop hidden absolute top-0 mt-12 w-40 py-2 right-1/2 translate-x-1/2
            rounded-md bg-white border border-app-gray-lite
            text-center shadow-md
        "
        >
        <ul>
            @foreach (config('languages') as $lang => $language)
                @if(app()->currentLocale() !== $lang)
                    <li class="hover:bg-app-gray-lite">
                        <a class="full-w py-2 block" href="{{ route('lang.switch', $lang) }}">
                            {{ $language }}
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>
