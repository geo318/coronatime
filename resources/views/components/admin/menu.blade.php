<ul {{ $attributes(['class' => '']) }}>
    <li class="md:hidden text-right close text-2xl cursor-pointer">✕</li>
    <li class="p-5 md:p-0">
        <span class="md:hidden">{{ __('main.hi') }}, </span>
        <span class="font-bold text-base leading-5">{{ auth()->user()->username }}</span>
        <span class="md:hidden"> ! </span>
    </li>
    <div class="md:hidden border-b border-app-gray"></div>
    <li class="p-5 md:p-0">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="md:text-sm md:text-app-black text-app-blue  leading-4">{{ __('main.log_out') }}</button>
        </form>
    </li>
</ul>
