<x-app-layout style="text-align: center;">

    @include('navigation.school')

    <p style="font-size: 24px; margin-bottom: 10px;">{{ $school }} > {{ $course }} > {{ $branch }}> Sem {{ $semester }}</p>

    @if ($subjects->count() > 0)
        <ul class="list-unstyled d-flex flex-column" style="padding: 10px; margin: 10px; gap: 10px;">
            @foreach ($subjects as $subject)
                <a href="{{ url('/', [$school, $course, $branch, $semester, $subject]) }}" style="text-decoration: none;">
                    <li style="background-color: #008B8B; padding: 10px 110px; border-radius: 5px; transition: background-color 0.3s; font-size: 30px; margin-bottom: 10px;">
                        {{ $subject }}
                    </li>
                </a>
            @endforeach
        </ul>
    @else
        <p style="color: red; font-style: italic;">There are no subjects added yet. Please contact the administrator.</p>
    @endif
</x-app-layout>

