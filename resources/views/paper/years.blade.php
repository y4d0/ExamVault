<x-app-layout style="text-align: center;">

    @include('navigation.school')

    <div style="display: flex; justify-content: center;">
        <table style="width: 70%; border-collapse: collapse; margin-top: 40px; margin-bottom: 40px; text-align: center;">
            <tr>
                <th style="padding: 50px; border-bottom: 5px solid #000; font-size: 30px;">Year</th>
                <th style="padding: 50px; border-bottom: 5px solid #000; font-size: 30px;">View</th>
                <th style="padding: 50px; border-bottom: 5px solid #000; font-size: 30px;">Download</th>
            </tr>
            @foreach ($years as $year)
                <tr>
                    <td style="padding: 30px; border-bottom: 1px solid #000;">{{ $year }}</td>
                    <td style="padding: 20px; border-bottom: 1px solid #000;"><a href="{{ url('/', [$school, $course, $branch, $semester, $subject, 'show', $exams, $year, 'view']) }}" style="text-decoration: none; color: #008B8B;">view</a></td>
                    <td style="padding: 10px; border-bottom: 1px solid #000;"><a href="{{ url('/', [$school, $course, $branch, $semester, $subject, 'show', $exams, $year, 'download']) }}" style="text-decoration: none; color: #008B8B;">download</a></td>
                </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>
