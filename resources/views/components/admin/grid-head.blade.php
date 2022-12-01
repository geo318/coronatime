<div class="flex items-center col-span-1 text-left pl-10 py-5 text-sm font-semibold">
    <div>{{ $slot }}</div>
    <div class="ml-2">
        <a href="#">
            <img src="{{ asset('icons/triangle-up.svg') }}" alt="">
        </a>
        <a href="#">
            <img src="{{ asset('icons/triangle-down.svg') }}" alt="">
        </a>
    </div>
</div>