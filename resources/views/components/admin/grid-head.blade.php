@props(['col'])
<div class="flex items-center col-span-1 text-left md:pl-10 pl-4 py-5 text-sm font-semibold">
    <div>{{ $slot }}</div>
    <div class="ml-2 flex flex-col justify-center items-center gap-[.188rem]">
        <a href="?col={{ $col }}&sort=asc&{{ http_build_query(request()->except('col','sort')) }}">
            @if(app('request')->col === $col && app('request')->sort === 'asc')
                <x-admin.svg.asc active/>
            @else
                <x-admin.svg.asc/>
            @endif
        </a>
        <a href="?col={{ $col }}&sort=desc&{{ http_build_query(request()->except('col','sort')) }}">
            @if(app('request')->col === $col && app('request')->sort === 'desc')
            <x-admin.svg.desc active/>
        @else
            <x-admin.svg.desc/>
        @endif
        </a>
    </div>
</div>