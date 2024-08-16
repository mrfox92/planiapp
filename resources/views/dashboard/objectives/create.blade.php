<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.objectives.Create Learning Objectives for subject') }}: <small>{{ $subject->name }}</small>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h2 class="font-semibold text-xl text-gray-700 leading-tight">
                        {{ __('messages.objectives.You can register news learning objectives') }}
                    </h2>

                    @livewire('dashboard.objective.learning-objectives-create', ['subject' => $subject])
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
