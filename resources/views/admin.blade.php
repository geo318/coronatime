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
        <x-admin.tabs :world="$world"/>
        <x-admin.cards :stats="$stats"/>
        
    </div>
</x-layout>
