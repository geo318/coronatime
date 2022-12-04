@props(['stats'])
<div class="grid grid-cols-6 gap-6 mt-10">
    <x-admin.card class="col-span-6" text="{{ __('main.new_cases') }}" color="text-app-blue" bg="bg-app-blue" :number="$stats['confirmed']" icon="{{ asset('icons/curve-b.svg') }}"/>
    <x-admin.card class="col-span-3" text="{{ __('main.recovered') }}" color="text-app-green-lite" bg="bg-app-green-lite" :number="$stats['recovered']" icon="{{ asset('icons/curve-g.svg') }}"/>
    <x-admin.card class="col-span-3" text="{{ __('main.death') }}" color="text-app-yellow" bg="bg-app-yellow" :number="$stats['deaths']" icon="{{ asset('icons/curve-y.svg') }}"/>
</div>