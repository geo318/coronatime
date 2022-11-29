<x-layout>
    <div class="flex justify-center">
        <div class="flex-col min-w-[24.5rem]">
            <x-logo class="mb-[9rem] justify-center"/>
            <x-title class="text-center" text="Reset Password"/>
            <x-form.form class="max-w-[24.5rem] mt-14" action="{{ route('password.update') }}" method="POST">
                <x-form.input name="password" label="New password" placeholder="Enter new password" type="password" required="validate" pattern=".{3,}"/>
                <x-form.input name="password_confirmation" label="Repeat password" placeholder="Repeat password" type="password" required="validate" pattern=".{3,}"/>
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ last(explode('email=',urldecode(url()->full()))) }}">
                <x-form.submit class="full-w mt-14" text="Save Changes"/>
            </x-form.form>
        </div>
    </div>
</x-layout>
