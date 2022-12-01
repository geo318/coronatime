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
            <div class="mt-10 overflow-hidden rounded-lg border border-app-gray-lite">
                <div class="grid grid-cols-8 bg-app-gray-lite">
                    <x-admin.grid-head>Location</x-admin.grid-head>
                    <x-admin.grid-head>New cases</x-admin.grid-head>
                    <x-admin.grid-head>Deaths</x-admin.grid-head>
                    <x-admin.grid-head>Recovered</x-admin.grid-head>
                </div>
                <div class="max-h-[37.5rem] overflow-y-auto">
                    @foreach($stats as $stat)
                        <div class="grid grid-cols-8 ">
                            <x-admin.grid-row>{{ $stat->country }}</x-admin.grid-row>
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
