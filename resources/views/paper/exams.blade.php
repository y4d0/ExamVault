<x-app-layout>

    @if (session()->has('message'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show">
            <p>{{ session('message') }}</p>
        </div>
    @endif
    @include('navigation.school')

    @if ($exams->count() > 0)
        @foreach ($exams as $exam)
            <a
                href="{{ url('/', [$school, $course, $branch, $semester, $subject, 'show', $exam]) }}" style="background-color: #008B8B; padding: 10px 110px; border-radius: 5px; transition: background-color 0.3s; font-size: 30px; " class="mt-4">{{ $exam }}</a>
        @endforeach
    @else
        <p>There have no papers been uploaded for this subject yet.</p>
    @endif

</x-app-layout>
