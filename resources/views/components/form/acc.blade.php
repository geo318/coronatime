@props(['link','label','text'])
<div class="flex items-center justify-center">
    <span class="md:text-base md:leading-5 text-sm leading-4 text-dark-gray font-normal">{{ $label }}</span>
    <a class="md:text-base md:leading-5 text-sm leading-4 font-bold ml-2" href="{{ $link }}">{{ $text }}</a>
</div>
