<x-app-layout style="text-align: center;">

    @include('navigation.school')

    <p style="font-size: 24px; margin-bottom: 10px;">{{ $school }} > {{ $course }} > {{ $branch }}</p>

    <ul style="list-style: none; display: grid; grid-template-columns: repeat(4, 1fr); gap: 60px;">
        @for ($sem = 1; $sem <= $semesters[0]; $sem++)
            <a href="{{ route('subjects', ['school' => $school, 'course' => $course, 'branch' => $branch, 'sem' => $sem]) }}" style="text-decoration: none; display: flex; justify-content: center; align-items: center;">
                <li style="background-color: #008B8B; padding: 100px 110px; border-radius: 5px; transition: background-color 0.3s; font-size: 20px;">
                    Semester {{ $sem }}
                </li>
            </a>
        @endfor
    </ul>
</x-app-layout>
