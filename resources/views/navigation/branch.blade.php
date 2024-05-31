<x-app-layout style="text-align: center;">

    @include('navigation.school')

    <!-- Navigation path information -->
    <p style="margin-bottom: 10px; font-size: 24px;">{{ $school }} > {{ $course }}</p>

    <!-- Check if there are branches -->
    @if ($branches->count() > 0)
        <ul style="list-style: none; display: flex; gap: 10px; padding: 0; justify-content: center;">
            @foreach ($branches as $branch)
                <!-- Apply hover effect to the `li` element -->
                <a href="{{ url('/', [$school, $course, $branch]) }}" style="text-decoration: none;">
                    <li style="padding: 15px 25px; border-radius: 5px; transition: background-color 0.3s; font-size: 20px; margin-right: 10px; cursor: pointer; background-color: rgba(255, 255, 255, 0.1);"
                        onmouseover="this.style.backgroundColor = 'rgba(173, 216, 230, 0.4)';"
                        onmouseout="this.style.backgroundColor = 'rgba(255, 255, 255, 0.1)';">
                        {{ $branch }}
                    </li>
                </a>
            @endforeach
        </ul>
    @else
        <!-- Display message if no branches are available -->
        <p style="color: red; font-style: italic;">There are no branches added yet. Please contact the administrator.</p>
    @endif

</x-app-layout>
