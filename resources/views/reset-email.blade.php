<x-layout>
    <div class="flex justify-center">
        <div class="flex-col min-w-[24.5rem]">
            <x-logo class="mb-[9rem] justify-center"/>
            <x-title class="text-center" text="Reset Password"/>
            <x-form.form class="max-w-[24.5rem] mt-14" action="" method="">
                <x-form.input name="email" label="Email" placeholder="Enter your email" required="validate" pattern="/\b[\w\.-]+@[\w\.-]+\.\w{2,4}\b/gi"/>
                <x-form.submit class="full-w mt-14" text="Reset Password"/>
            </x-form.form>
        </div>
    </div>
</x-layout>
