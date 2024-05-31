<x-app-layout>
    @include('navigation.school')
    <div style="display:flex;justify-content:center">
        <iframe src="/assets/{{ $paper }} " height="600" width="400"></iframe>
    </div>
</x-app-layout>
