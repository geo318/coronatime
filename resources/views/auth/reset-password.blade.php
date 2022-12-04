<x-layout class="!pt-0 md:!pt-0">
    <div class="flex justify-center pt-0 md:pt-0">
        <div class="flex-col md:min-w-[24.5rem] w-full h-screen relative">
            <x-logo class="md:mb-[9rem] mb-10 justify-center md:mt-10 mt-6"/>
            <x-title class="text-center" text="{{ __('main.reset_password') }}"/>
            <x-form.form class="flex flex-col grow md:max-w-[24.5rem] md:mt-14 mt-10 mx-auto" action="{{ route('password.update') }}" method="POST">
                <x-form.input name="password" label="{{ __('main.new_password') }}" placeholder="{{ __('main.new_password') }}" type="password" required="validate" pattern=".{3,}"/>
                <x-form.input name="password_confirmation" label="{{ __('main.repeat_password') }}" placeholder="{{ __('main.repeat_password') }}" type="password" required="validate" pattern=".{3,}"/>
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ last(explode('email=',urldecode(url()->full()))) }}">
                <x-form.submit class="full-w md:mt-14 md:relative absolute bottom-10 left-0 right-0" text="{{ __('main.save_changes') }}"/>
            </x-form.form>
        </div>
    </div>
</x-layout>
