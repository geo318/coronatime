<x-layout>
    <div>
        <div class="flex-col min-w-[24.5rem]">
            <x-logo class="mb-[3.5rem]"/>
            <x-title text="Welcome back"/>
            <x-subtitle class="mt-4 mb-6" text="Welcome back! Please enter your details"/>
            <x-form.form class="max-w-[24.5rem]" action="{{ route('login') }}" method="POST">
                <x-form.input name="login" label="Username" placeholder="Enter your username or email" required="validate" pattern=".{3,}"/>
                <x-form.input name="password" label="Password" placeholder="Fill in password" type="password" required="validate" pattern=".{3,}"/>
                <x-form.checkbox name="remember" label="Remember this device" link="{{ route('password.request') }}" password/>
                <x-form.submit class="mt-7 mb-6 full-w" text="sign in"/>
                <x-form.acc label="Don’t have and account?" text="Sign up for free" link="{{ route('register') }}"/>
            </x-form.form>
            <script src="{{ url('/js/login.js') }}" defer></script>
        </div>
        <x-img-bar/>
    </div>
</x-layout>
