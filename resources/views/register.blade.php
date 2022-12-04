<x-layout>
    <div>
        <div class="flex-col min-w-full">
            <x-logo class="md:mb-[3.5rem] mb-10"/>
            <x-title text="{{ __('main.welcome') }}"/>
            <x-subtitle class="md:mt-4 md:mb-6 mt-2 mb-6" text="{{ __('main.welcome_sub') }}"/>
            <x-form.form class="lg:max-w-[25rem]" action="{{ route('register') }}" method="POST">
                <x-form.input name="username" label="{{ __('main.username') }}" placeholder="{{ __('main.username_holder') }}" required="validate" pattern=".{3,}" hint="{{ __('main.username_hint') }}"/>
                <x-form.input name="email" label="{{ __('main.email') }}" placeholder="{{ __('main.email_holder') }}" required="validate" pattern="^[A-z0-9+_.-]+@[A-z0-9+_.-]+\.([A-z]{2,})$"/>
                <x-form.input name="password" label="{{ __('main.password') }}" placeholder="{{ __('main.password_holder') }}" type="password" required="validate" pattern=".{3,}"/>
                <x-form.input name="repeat" label="{{ __('main.repeat_password') }}" placeholder="{{ __('main.repeat_password') }}" type="password" required="validate" pattern=".{3,}"/>
                <x-form.submit class="md:mt-7 mt-6 mb-6 full-w"  text="{{ __('main.sign_up') }}"/>
                <x-form.acc label="{{ __('main.have_account') }}" text="{{ __('main.log_in') }}" link="{{ route('login') }}"/>
            </x-form.form>
        </div>
        <x-img-bar/>
    </div>
</x-layout>
