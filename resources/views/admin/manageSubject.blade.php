<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Add Subject
        </h2>
    </x-slot>

    <div class="mt-4 flex flex-col items-center justify-center gap-4">
        <div x-data="{ formVisible: false }" class="w-3/4 flex flex-col justify-center">
            <button class="rounded-lg border p-2 text-white" @click="formVisible=!formVisible">Add Subject</button>
            <form action="{{route('admin.storeSubject')}}" method="post" x-show="formVisible" class="flex flex-col justify-center">
                @csrf
                <select id="school" name="school">
                    <option value="">Please select your school name</option>
                    @foreach ($schools as $school)
                        <option value="{{ $school->school_name }} ">{{ $school->school_name }} </option>
                    @endforeach
                </select>
                <select id="course" name="course">
                    <option value="">Please select your course</option>
                </select>
                <select name="branch" id="branch">
                    <option value="">Please select your branch</option>
                </select>
                <select name="semester" id="semester">
                    <option value="">Please select your semester</option>
                </select>
                <input type="text" name="subject" id="subject" placeholder="Please enter a subject">
        
                <button class="dark:text-white" type="submit">Submit</button>
            </form>

        </div>

        <table class="text-white">
            <thead>
                <tr>
                    <th class="border border-white p-2">Course Name</th>
                    <th class="border border-white p-2">Branch Name</th>
                    <th class="border border-white p-2">Semester</th>
                    <th class="border border-white p-2">Subject</th>
                    <th class="border border-white p-2">Delete</th>
                    {{-- <th>Edit</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($branches as $branch)
                    <tr>
                        <td class="border border-white p-2">{{ $branch->course_name }}</td>
                        <td class="border border-white p-2">{{ $branch->branch_name }}</td>
                        <td class="border border-white p-2">{{ $branch->semester }}</td>
                        <td class="border border-white p-2">{{ $branch->subject }}</td>
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
        document.getElementById('course').addEventListener('change', function() {
            let courseName = this.value;
            let branchDropDown = document.getElementById('branch');
            let semesterDropDown = document.getElementById('semester');
            branchDropDown.innerHTML = '<option value=""> Loading... </option>';

            fetch('getBranches/' + courseName)
                .then(response => response.json())
                .then((data) => {
                    branchDropDown.innerHTML = '<option value="">Please select your branch</option>';
                    Object.values(data[0]).forEach(branch => {
                        branchDropDown.innerHTML += '<option value="' + branch + '">' +
                            branch + '</option>';
                    });
                    for (let i = 1; i <= data[1][0]; i++) {
                        semesterDropDown.innerHTML += '<option value="' + i + '">' +
                            i + '</option>';
                    }
                })
                .catch((err) => {
                    console.log(err);
                });
        })

    </script>
</x-admin-layout>