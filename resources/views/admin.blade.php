<x-layout header class="mt-20">
    <div>
        @isset($world)
            <x-admin.heading>
                Worldwide Statistics
            </x-admin.heading>
        @else
        <x-admin.heading>
            Statistics by country
        </x-admin.heading>
        @endisset
        <x-admin.tabs :world="$world ?? false"/>

        @isset($world)
            <x-admin.cards :stats="$worldStats"/>
        @else
            <div class="my-10">
                <x-form.form class="relative" action="" method="GET" no_csrf no_validation>
                    @if(request('col'))
                        <input type="hidden" name="col" value="{{ request('col') }}">
                        <input type="hidden" name="sort" value="{{ request('sort') }}">
                    @endif
                    <input type="text" name="search" placeholder="Search by country" 
                        value="{{ request('search') }}"
                        class="border border-app-gray px-14 py-4 w-60 rounded-lg text-sm leading-4
                            focus:border-app-blue focus:app-shadow outline-none
                        " 
                    >
                    <button type="submit" class="absolute left-6 top-1/2 translate-y-[-50%]">
                        <img src="{{ asset('icons/magnifier.svg') }}" alt="magnify">
                    </button>
                </x-form.form>
            </div>
            <div class="mt-10 overflow-hidden rounded-lg border border-app-gray-lite">
                <div class="grid bg-app-gray-lite grid-cols-5 pr-4">
                    <x-admin.grid-head col="country">Location</x-admin.grid-head>
                    <x-admin.grid-head col="confirmed">New cases</x-admin.grid-head>
                    <x-admin.grid-head col="deaths">Deaths</x-admin.grid-head>
                    <x-admin.grid-head col="recovered">Recovered</x-admin.grid-head>
                </div>
                <div class="max-h-[37.5rem] overflow-y-scroll">
                    @foreach($stats as $stat)
                        <div class="grid grid-cols-5">
                            <x-admin.grid-row>{{ json_decode($stat->locale,true)[app()->getLocale()] }}</x-admin.grid-row>
                            <x-admin.grid-row>{{ $stat->confirmed }}</x-admin.grid-row>
                            <x-admin.grid-row>{{ $stat->deaths }}</x-admin.grid-row>
                            <x-admin.grid-row>{{ $stat->recovered }}</x-admin.grid-row>
                        </div>
                    @endforeach
                </div>   
            </div>
        @endisset
    </div>
</x-layout>
