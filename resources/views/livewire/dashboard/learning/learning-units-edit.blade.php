<div key="{{ $rand }}">
    <form wire:submit.prevent="save" class="space-y-6 my-4">

        <div>
            <label for="title" class="block text-sm font-medium text-grey-700">Título</label>
            <input type="text" wire:model="editForm.title" id="title"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                placeholder="ingrese título unidad de aprendizaje">
            @error('editForm.title')
                <span class="text-red-500 text-sm"> {{ $message }} </span>
            @enderror
        </div>
        <div>
            <label for="number" class="block text-sm font-medium text-grey-700">Número</label>
            <input type="number" wire:model="editForm.number" id="number" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="ingrese número de la unidad">
            @error('editForm.number')
                <span class="text-red-500 text-sm"> {{ $message }} </span>
            @enderror
        </div>
        <div>
            <label for="description" class="block text-sm font-medium text-grey-700">Descripción</label>
            <textarea wire:model="editForm.description" id="description" rows="4"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                placeholder="ingrese descripción (opcional)"></textarea>
            @error('editForm.description')
                <span class="text-red-500 text-sm"> {{ $message }} </span>
            @enderror
        </div>
        <div>
            <label for="subject_id" class="block text-sm font-medium text-grey-700">Asignatura</label>
            <select id="subject_id" wire:model="editForm.subject_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">Seleccione una asignatura</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
            @error('editForm.subject_id')
                <span class="text-red-500 text-sm"> {{ $message }} </span>
            @enderror
        </div>
        <div>
            <button type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Editar Unidad
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Livewire.on('learningUnitUpdated', params => {
            const { title, text } = params[0];
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: title,
                showConfirmButton: false,
                timer: 1500
            });
        });
    });
</script>
@endpush
