<nav class="ml-auto">
    <ul class="flex flex-row gap-8 items-center">
        <li class="flex mr-auto md:mr-0 ml-auto">
            <x-dropdown/>
            <img class="ml-2" src="{{ asset('icons/arrow.svg') }}" alt="">
        </li>
        <li class="md:block hidden">
            <x-admin.menu class="flex gap-8"/>
        </li>

        <li class="md:hidden block">
            <div class="trigger p-1 hover:cursor-pointer">
                <img src="{{ asset('icons/menu.svg') }}" alt="">
            </div>
            <x-admin.menu 
                class="drop hidden fixed top-0 right-0 bottom-0 z-20
                    bg-white px-5 py-6 border-l border-app-gray-lite shadow-lg w-9/12
                "
            />
        </li>
    </ul>
</nav>
