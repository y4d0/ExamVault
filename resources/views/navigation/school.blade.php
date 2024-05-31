<nav class="flex justify-center bg-gray-100 dark:bg-gray-800 p-4"> <!-- Added padding for spacing -->
    <ul class="flex list-none gap-4">
        @foreach ($schools as $school)
            <x-nav-link href="{{ url('/', [$school->school_name]) }}">
                <!-- Added hover styles -->
                <li class="cursor-pointer text-xl px-6 py-3 text-gray-800 dark:text-gray-200 hover:bg-blue-100 hover:text-blue-500 rounded transition-all duration-200 ease-in-out">
                    {{ $school->school_name }}
                </li>
            </x-nav-link>
        @endforeach
    </ul>
</nav>
