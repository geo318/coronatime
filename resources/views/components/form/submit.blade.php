@props(['text'])
<div {{ $attributes(['class'=>'flex']) }}>
    <button type="submit" class="w-full uppercase py-5 bg-app-green-lite hover:bg-app-green-darker text-app-white font-black text-base leading-5 rounded-lg">{{ $text ?? 'submit' }}</button>
</div>
