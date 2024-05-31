<x-app-layout style="text-align: center;">

    @include('navigation.school')

    <p style="font-size: 24px; margin-bottom: 10px;">{{ $school }}</p>

    @if ($courses->count() > 0)
        <ul style="list-style: none; padding: 0; margin: 0;">
            @foreach ($courses as $course)
                <a href="{{ url('/', [$school, $course->course_name]) }}" style="text-decoration: none; display: block;">
                    <li style="padding: 50px 100px; border-radius: 5px; transition: transform 0.3s, background-color 0.3s; cursor: pointer;"
                        onmouseover="this.style.backgroundColor = 'rgba(173, 216, 230, 0.4)'; this.style.transform = 'scale(1.05)';"
                        onmouseout="this.style.backgroundColor = 'transparent'; this.style.transform = 'scale(1.0)';">
                        {{ $course->course_name }}
                    </li>
                </a>
            @endforeach
        </ul>
    @else
        <p style="color: red; font-style: italic;">There are no courses added yet. Please contact the administrator.</p>
    @endif

</x-app-layout>
