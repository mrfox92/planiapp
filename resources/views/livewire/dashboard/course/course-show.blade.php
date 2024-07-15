<div x-data="{ open: false }"
     x-show="open"
     @course-detail-shown.window="open = true"
     @close-course-detail.window="open = false"
     class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                    {{ $course->name ?? '' }}
                </h3>
            </div>
            <div class="px-4 py-5 sm:p-6">
                @if($course)
                    {{-- <p class="text-gray-600 mb-2"><strong>Description:</strong> {{ Str::limit($course->description, 50) }}</p> --}}
                    <p class="text-gray-600 mb-2"><strong>Description:</strong> {{ $course->description }}</p>
                    <!-- Añadir más campos según sea necesario -->
                @endif
                <button wire:click="close()" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Close</button>
            </div>
        </div>
    </div>
</div>

