<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    
    @if (session('success'))
        <div class="dark:text-white fixed left-1/2 top-0 -translate-x-1/2 transform px-48 py-3" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show">
            {{ session('success') }}
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 dark:text-white overflow-hidden shadow-sm sm:rounded-lg flex items-center justify-center gap-4">
                <a href="{{ route('admin.showSchoolForm')}}">Manage School</a>
                <a href="{{ route('admin.showCourseForm')}}">Manage Course</a>
                <a href="{{ route('admin.showBranchForm')}}">Manage Branch</a>
                <a href="{{ url('admin/manageSubject')}}">Manage Subject</a>
            </div>
        </div>
    </div>
</x-admin-layout>
