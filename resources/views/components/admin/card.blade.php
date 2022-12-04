@props(['color','bg','number','text','icon'])

<div {{ $attributes(["class"=>"md:col-span-2 h-64 rounded-2xl relative overflow-hidden text-center"]) }}>
    <div class="{{ $bg }} opacity-[0.08] absolute inset-0"></div>
    <div class="flex justify-center mb-6 mt-10">
        <img src="{{ $icon }}" alt="new cases" class="max-w-[5.625rem] h-16">
    </div>
    <p class="md:leading-2xl md:text-xl text-base leading-5 mb-4">{{ $text }}</p>
    <p class="md:text-[2.44rem] text-2xl leading-7 md:leading-[2.94rem] font-black {{ $color }}">{{ number_format($number) }}</p>
</div>