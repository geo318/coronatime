@props(['method', 'action','no_csrf','no_validation'])
<form {{ $attributes(['class'=>'mb-10']) }} action="{{ $action }}" method="{{ $method }}">
    
    @unless($no_csrf ?? false)
        @csrf
    @endif
    {{ $slot }}
    @unless($no_validation ?? false)
        <script src="{{ url('/js/validate.js') }}" defer></script>
    @endif
    
</form>
