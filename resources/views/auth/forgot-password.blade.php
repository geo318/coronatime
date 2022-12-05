<x-layout class="!pt-0 md:!pt-0">
    <div class="flex justify-center">
        <div class="flex flex-col h-screen md:min-w-[24.5rem] min-w-full">
            <x-logo class="mb-[9rem] justify-center md:mt-10 mt-6"/>
            <x-title class="text-center" text="{{ __('main.reset_password') }}"/>
            <x-form.form class="flex flex-col h-full min-w-full md:max-w-[24.5rem] mt-14" action="{{ route('password.email') }}" method="POST">
                <x-form.input class="mb-auto" name="email" label="{{ __('main.email') }}" placeholder="{{ __('main.email_holder') }}" required="validate" pattern="^[A-z0-9+_.-]+@[A-z0-9+_.-]+\.([A-z]{2,})$"/>
                <x-form.submit class="md:mt-14 mt-auto full-w mb-10" text="{{ __('main.reset_password') }}"/>
            </x-form.form>
        </div>
    </div>
</x-layout>
