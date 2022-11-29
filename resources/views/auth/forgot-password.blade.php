<x-layout>
    <div class="flex justify-center">
        <div class="flex-col min-w-[24.5rem]">
            <x-logo class="mb-[9rem] justify-center"/>
            <x-title class="text-center" text="Reset Password"/>
            <x-form.form class="max-w-[24.5rem] mt-14" action="{{ route('password.email') }}" method="POST">
                <x-form.input name="email" label="Email" placeholder="Enter your email" required="validate" pattern="^[A-z0-9+_.-]+@[A-z0-9+_.-]+\.([A-z]{2,})$"/>
                <x-form.submit class="full-w mt-14" text="Reset Password"/>
            </x-form.form>
        </div>
    </div>
</x-layout>
