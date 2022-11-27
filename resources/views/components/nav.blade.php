<nav class="ml-auto">
    <ul class="flex flex-row gap-8">
        <li>
            <x-dropdown/>
        </li>
        <li>
            <span>{{ auth()->user()->username }}</span>
        </li>
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="">logout</button>
            </form>
        </li>
    </ul>
</nav>
