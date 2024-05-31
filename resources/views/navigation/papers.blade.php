<x-app-layout style="text-align: center;">

    @include('navigation.school')

    <p style="font-size: 24px; margin-bottom: 10px;">{{ $school }} > {{ $course }} > {{ $branch }}> Sem {{ $semester }} > {{ $subject }}</p>

    <a href="{{ url('/', [$school, $course, $branch, $semester, $subject, 'create']) }}" style="background-color: #008B8B; padding: 10px 110px; border-radius: 5px; transition: background-color 0.3s; font-size: 30px; margin-bottom: 10px;">Upload paper</a>
    <a href="{{ url('/', [$school, $course, $branch, $semester, $subject, 'show']) }}" style="background-color: #008B8B; padding: 10px 110px; border-radius: 5px; transition: background-color 0.3s; font-size: 30px; margin-bottom: 10px;">View paper</a>
</x-app-layout>
