<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Manage School
        </h2>
    </x-slot>

    <div class="mt-4 flex flex-col items-center justify-center gap-4">
        <div  x-data="{ formVisible: false }" class="w-3/4 flex flex-col justify-center">
            <button class="rounded-lg border p-2 text-white" @click="formVisible=!formVisible" >Add School</button>
            <form action="{{ route('admin.storeSchool') }}" method="post" class="flex flex-col"x-show="formVisible">
                @csrf
                <input type="text" name="school" placeholder="Please enter the school name">
                <button type="submit" class="dark:text-white">Submit</button>
            </form>
        </div>

        <table id="schools" class="display text-white">
            <thead>
                <tr>
                    <th class="border border-white p-2">School Name</th>
                    <th class="border border-white p-2">Delete</th>
                    {{-- <th>Edit</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($schools as $school)
                    <tr>
                        <td class="border border-white p-2">{{ $school->school_name }}</td>
                        {{-- <td><a href="{{route('admin.editSchool',$school->school_name)}}"><span class="material-symbols-outlined">edit</span></a></td> --}}
                        <td class="border border-white p-2">
                            <form method="POST" action="{{route('admin.deleteSchool',[$school->school_name])}}">
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