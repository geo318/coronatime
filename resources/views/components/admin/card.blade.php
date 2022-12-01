@props(['color','bg','number','text','icon'])

<div class="h-64 rounded-2xl col-span-2 relative overflow-hidden text-center">
    <div class="{{ $bg }} opacity-[0.08] absolute inset-0"></div>
    <div class="flex justify-center mb-6 mt-10">
        <img src="{{ $icon }}" alt="new cases" class="max-w-[5.625rem] h-16">
    </div>
    <p class="leading-2xl text-xl mb-4">{{ $text }}</p>
    <p class="text-[2.44rem] leading-[2.94rem] font-black {{ $color }}">{{ number_format($number) }}</p>
</div>