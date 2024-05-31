<x-admin-layout>
<x-slot name="header">
    <h2 class=" text-white">Edit School</h2>
</x-slot>
    <div class="mt-4 flex flex-col items-center justify-center gap-4">
        <div>
            <form action="{{route('admin.updateSchool', $school)}}" method="post" class="flex flex-col">
                @csrf
                @method('PUT')
                <input type="text" name="school" value="{{$school}}">
                <button type="submit" class="dark:text-white">Submit</button>
            </form>
        </div>
    </div>
</x-admin-layout>

