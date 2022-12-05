@props(['message', 'action', 'text', 'resend'])
<x-layout class="!pt-0 md:!pt-0">
    <div class="flex justify-center">
        <div class="h-screen md:min-w-[24.5rem] min-w-full flex flex-col">
            <x-logo class="justify-center md:mt-10 mt-6"/>

            <div class="mt-auto flex justify-center pb-4">
                <img src="{{ asset('icons/success.svg') }}" alt="success">
            </div>

            <div class="md:mb-24 mb-auto text-center">
                <h3 class="text-lg font-normal leading-5">{{ $message }}</h3>
            </div>
            @isset($action)
                <a href="{{ route('login') }}" class="mt-auto md:mt-0 mb-10 md:mb-auto">
                    <x-button class="">{{ $slot }}</x-button>
                </a>
            @endisset

            @isset($resend) 
            <div class="flex mt-auto md:mt-0 mb-10 md:mb-auto">
                <x-form.form class="mb-0 flex w-full justify-center" action="{{ route('verification.send') }}" method="POST" no_csrf no_validation>
                    <button type="submit" class="p-3 w-full md:max-w-xs rounded-md text-center bg-blue-700 text-white border border-blue-700 hover:bg-blue-900">
                        {{ __('main.resend') }}
                    </button>   
                </x-form.form>
            </div>
            @endisset
        </div>
    </div>
</x-layout>