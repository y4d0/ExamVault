<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Add Branch
        </h2>
    </x-slot>

    <div class="mt-4 flex flex-col items-center justify-center gap-4">
        <div x-data="{ formVisible: false }" class="w-3/4 flex flex-col justify-center">
            <button class="rounded-lg border p-2 text-white" @click="formVisible=!formVisible">Add Branch</button>
            <form action="{{ route('admin.storeBranch') }}" method="post" class="flex flex-col justify-center" x-show="formVisible">
                @csrf
                <select id="school" name="school">
                    <option value="">Please select your school</option>
                    @foreach ($schools as $school)
                        <option value="{{ $school->school_name }} ">{{ $school->school_name }} </option>
                    @endforeach
                </select>
                <select id="course" name="course">
                    <option value="">Please select your course</option>
                </select>
                <input type="text" name="branch" placeholder="Please enter the branch name">
                <button class="dark:text-white" type="submit">Submit</button>
            </form>
        </div>
        <table class="text-white">
            <thead>
                <tr>
                    <th class="border border-white p-2">Course Name</th>
                    <th class="border border-white p-2">Branch Name</th>
                    <th class="border border-white p-2">Delete</th>
                    {{-- <th>Edit</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($branches as $branch)
                    <tr>
                        <td class="border border-white p-2">{{ $branch->course_name }}</td>
                        <td class="border border-white p-2">{{ $branch->branch_name }}</td>
                        {{-- <td>
                            <a href="{{ url('/admin/course', [$course->course_name]) }}">
                                <span class="material-symbols-outlined">edit</span>
                            </a>
                        </td> --}}
                        <td class="border border-white p-2">
                            {{-- <form method="POST" action="{{ route('admin.deleteBranch', $course->course_name) }}">
                                @csrf
                                @method('DELETE') --}}
                                <button>
                                    <span class="material-symbols-outlined">delete</span>
                                </button>
                            {{-- </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>




    <script>
        document.getElementById('school').addEventListener('change', function() {
            let schoolName = this.value;
            let courseDropDown = document.getElementById('course');
            courseDropDown.innerHTML = '<option value=""> Loading... </option>';

            fetch('getCourses/' + schoolName)
                .then(response => response.json())
                .then((data) => {
                    courseDropDown.innerHTML = '<option value="">Please select your course</option>';
                    data.forEach(course => {
                        courseDropDown.innerHTML += '<option value="' + course.course_name + '">' +
                            course.course_name + '</option>';
                    });
                })
                .catch((err) => {
                    console.log(err);
                });
        })
    </script>
</x-admin-layout>
