<x-layout header class="mt-20">
    <div>
        @isset($world)
            <x-admin.heading>
                {{ __('main.worldwide_statistics') }}
            </x-admin.heading>
        @else
        <x-admin.heading>
            {{ __('main.statistics_by_country') }}
        </x-admin.heading>
        @endisset
        <x-admin.tabs :world="$world ?? false"/>

        @isset($world)
            <x-admin.cards :stats="$worldStats"/>
        @else
            <div class="md:my-10 my-5">
                <x-form.form class="relative" action="" method="GET" no_csrf no_validation>
                    @if(request('col'))
                        <input type="hidden" name="col" value="{{ request('col') }}">
                        <input type="hidden" name="sort" value="{{ request('sort') }}">
                    @endif
                    <input type="text" name="search" placeholder="{{ __('main.search_by_country') }}" 
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
            <div class="md:mt-10 mt-0 overflow-hidden rounded-lg border border-app-gray-lite">
                <div class="grid bg-app-gray-lite md:grid-cols-5 grid-cols-4 pr-4">
                    <x-admin.grid-head col="country">{{ __('main.location') }}</x-admin.grid-head>
                    <x-admin.grid-head col="confirmed">{{ __('main.new_cases') }}</x-admin.grid-head>
                    <x-admin.grid-head col="deaths">{{ __('main.deaths') }}</x-admin.grid-head>
                    <x-admin.grid-head col="recovered">{{ __('main.recovered') }}</x-admin.grid-head>
                </div>
                <div class="max-h-[37.5rem] overflow-y-scroll">
                    @foreach($stats as $stat)
                        <div class="grid md:grid-cols-5 grid-cols-4">
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
