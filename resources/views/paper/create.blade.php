<x-app-layout >
    @include('navigation.school')
    <form action="{{ url('/', [$school, $course, $branch, $semester, $subject, 'upload']) }}" method="post"
        enctype="multipart/form-data" >
        @csrf
        <div class="">
            <select name="examination_type" required style="color:black">
                <option value="">Please select your examination</option>
                <option value="mid-term">Mid-Term</option>
                <option value="end-term">End-Term</option>
            </select>
            @error('examination_type')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <div class="">
            <input type="number" name="year" placeholder="Please enter your year of paper" style="color:black">
            @error('year')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <div class="">
            <input type="file" name="paper">
            @error('paper')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <x-primary-button type="submit">Upload</x-primary-button>
    </form>
</x-app-layout>
