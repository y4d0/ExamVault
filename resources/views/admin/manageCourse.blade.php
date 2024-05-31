<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Manage Course
        </h2>
    </x-slot>

    <div class="mt-4 flex flex-col items-center justify-center gap-4">
        <div x-data="{ formVisible: false }" class="w-3/4 flex flex-col justify-center">
            <button class="rounded-lg border p-2 text-white" @click="formVisible=!formVisible">Add Course</button>
            <form action="{{ route('admin.storeCourse') }}" method="post" class="flex flex-col justify-center"
                x-show="formVisible">
                @csrf
                <select name="school">
                    <option value="">Please select your school</option>
                    @foreach ($schools as $school)
                        <option value="{{ $school->school_name }} ">{{ $school->school_name }} </option>
                    @endforeach
                </select>
                <input type="text" name="course" placeholder="Please enter the course name">
                <input type="number" name="semesters" placeholder="Please enter the no. of semesters">
                <button class="dark:text-white" type="submit">Submit</button>
            </form>

        </div>
        <table class="text-white mt-6">
            <thead>
                <tr>
                    <th class="border border-white p-2">School Name</th>
                    <th class="border border-white p-2">Course Name</th>
                    <th class="border border-white p-2">Semesters</th>
                    <th class="border border-white p-2">Delete</th>
                    {{-- <th>Edit</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td class="border border-white p-2">{{ $course->school_name }}</td>
                        <td class="border border-white p-2">{{ $course->course_name }}</td>
                        <td class="border border-white p-2">{{ $course->no_of_semesters }}</td>
                        {{-- <td>
                            <a href="{{ url('/admin/course', [$course->course_name]) }}">
                                <span class="material-symbols-outlined">edit</span>
                            </a>
                        </td> --}}
                        <td class="border border-white p-2">
                            <form method="POST" action="{{url('admin/course/{course}')}}">
                                @csrf
                                @method('DELETE')
                                <button>
                                    <span class="material-symbols-outlined">delete</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-admin-layout>
