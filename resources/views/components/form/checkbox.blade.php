@props(['label','name', 'password', 'link'])
<div class="flex items-center">
    <input
        class="form-check-input appearance-none h-5 w-5 border border-app-gray rounded bg-white
            checked:bg-app-green checked:border-0 checked:bg-[url('/public/icons/check.svg')] bg-[length:0.7rem]
            focus:outline-none transition duration-200 align-top bg-no-repeat bg-center float-left cursor-pointer
        "
        type="checkbox" value="true" id="{{ $name }}" name="{{ $name }}"
    >
    <label class="ml-2 form-check-label inline-block text-gray-800 font-semibold text-sm leading-5" for="{{ $name }}">
        {{ $label ?? '' }}
    </label>
    @isset($password)
        <a href="{{ $link }}" class="font-semibold text-sm leading-5 text-app-blue ml-auto">Forgot password?</a>
    @endisset

</div>
