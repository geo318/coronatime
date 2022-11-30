@props(['message', 'action', 'text'])
<x-layout>
    <div class="flex justify-center">
        <div class="flex-col min-w-[24.5rem]">
            <x-logo class="mb-[9rem] justify-center"/>

            <div class="mt-60 pt-3 flex justify-center mb-4">
                <img src="{{ asset('icons/success.svg') }}" alt="success">
            </div>

            <div class="text-center">
                <h3 class="text-lg font-normal leading-5">{{ $message }}</h3>
            </div>
            @isset($action)
                <a href="{{ route('login') }}">
                    <x-button class="mt-[5.8rem]">{{ $slot }}</x-button>
                </a>
            @endisset
        </div>
    </div>
</x-layout>