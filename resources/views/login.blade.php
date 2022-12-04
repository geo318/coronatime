<x-layout>
    <div>
        <div class="flex-col min-w-full">
            <x-logo class="md:mb-[3.5rem] mb-10"/>
            <x-title text="{{ __('main.welcome_back') }}"/>
            <x-subtitle class="md:mt-4 md:mb-6 mt-2 mb-6" text="{{ __('main.welcome_back_sub') }}"/>
            <x-form.form class="lg:max-w-[25rem]" action="{{ route('login') }}" method="POST">
                <x-form.input name="login" label="{{ __('main.username_email') }}" placeholder="{{ __('main.username_email_holder') }}" required="validate" pattern=".{3,}"/>
                <x-form.input class="pb-2" name="password" label="{{ __('main.password') }}" placeholder="{{ __('main.password_holder') }}" type="password" required="validate" pattern=".{3,}"/>
                <x-form.checkbox name="remember" label="{{ __('main.remember') }}" link="{{ route('password.request') }}" password/>
                <x-form.submit class="md:mt-7 mt-6 mb-6 full-w" text="{{ __('main.sign_in') }}"/>
                <x-form.acc label="{{ __('main.have_no_account') }}" text="{{ __('main.sign_up_free') }}" link="{{ route('register') }}"/>
            </x-form.form>
            <script src="{{ url('/js/login.js') }}" defer></script>
        </div>
        <x-img-bar/>
    </div>
</x-layout>
