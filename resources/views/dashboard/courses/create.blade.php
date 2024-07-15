<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h2 class="font-semibold text-xl text-gray-700 leading-tight">
                        {{ __('You can register a new course') }}
                    </h2>

                    @livewire('dashboard.course.course-create')
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
