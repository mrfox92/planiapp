<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.teacher.Edit Teacher') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h2 class="font-semibold text-xl text-gray-700 leading-tight">
                        {{ __('messages.teacher.You can edit an existing teacher') }}
                    </h2>

                    @livewire('dashboard.teacher.teacher-edit', ['teacherId' => $teacherId])
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
