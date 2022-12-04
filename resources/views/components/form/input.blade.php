@props(['label','name','placeholder','hint','type','required','pattern'])
<div {{ $attributes(['class'=>'flex flex-col md:mb-6 mb-4']) }}>
    <label class="md:text-base md:leading-5 text-sm leading-4 mb-2 font-bold" for="{{ $name }}">{{ $label }}</label>
    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type ?? 'text' }}"
        placeholder="{{ $placeholder }}"
        pattern="{{ $pattern }}"
        class="border rounded-lg py-[1.125rem] px-6 font-normal text-base leading-5 outline-none min-w-full
            {{ $errors->any() ? "border-app-red" : "border-app-gray focus:border-app-blue focus:app-shadow" }}
            {{ $required ?? "" }}
        "
    >
    @isset($hint)
        <span class="mt-2 text-dark-gray text-sm leading-4 font-normal {{ $errors->any() ? 'hidden' : 'block' }}">
            {{ $hint }}
        </span>
    @endisset
    @error($name)
        <span class="span-error text-sm leading-4 font-normal">{{ $message }}</span>
    @enderror
</div>
