@props(['method', 'action',])
<form {{ $attributes(['class'=>'mb-10']) }} action="{{ $action }}" method="{{ $method }}">
    @csrf
    {{ $slot }}
    <script src="{{ url('/js/validate.js') }}" defer></script>
</form>
