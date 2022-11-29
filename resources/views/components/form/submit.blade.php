@props(['text'])
<div {{ $attributes(['class'=>'flex']) }}>
    <x-button type="submit">{{ $text }}</x-button>
</div>
