@props(['link','label','text'])
<div class="flex items-center justify-center">
    <span class="text-base leading-5 text-dark-gray font-normal">{{ $label }}</span>
    <a class="text-base leading-5 font-bold ml-2" href="{{ $link }}">{{ $text }}</a>
</div>
