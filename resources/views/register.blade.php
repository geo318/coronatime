<x-layout>
    <div>
        <div class="flex-col min-w-[24.5rem]">
            <x-logo class="mb-[3.5rem]"/>
            <x-title text="Welcome to Coronatime"/>
            <x-subtitle class="mt-4 mb-6" text="Please enter required info to sign up"/>
            <x-form.form class="max-w-[24.5rem]" action="{{ route('register') }}" method="POST">
                <x-form.input name="username" label="Username" placeholder="Enter unique username" required="validate" pattern=".{3,}" hint="Username should be unique, min 3 symbols"/>
                <x-form.input name="email" label="Email" placeholder="Enter your email" required="validate" pattern="^[A-z0-9+_.-]+@[A-z0-9+_.-]+\.([A-z]{2,})$"/>
                <x-form.input name="password" label="Password" placeholder="Fill in password" type="password" required="validate" pattern=".{3,}"/>
                <x-form.input name="repeat" label="Repeat password" placeholder="Repeat password" type="password" required="validate" pattern=".{3,}"/>
                <x-form.submit class="mt-7 mb-6 full-w" text="sign up"/>
                <x-form.acc label="Already have an account?" text="Log in" link="{{ route('login') }}"/>
            </x-form.form>
        </div>
        <x-img-bar/>
    </div>
</x-layout>
