@props(['text'])
<div {{ $attributes(['class'=>'flex']) }}>
    <x-button class="t text-sm leading-4 md:text-base md:leading-5" type="submit">{{ $text }}</x-button>
</div>
