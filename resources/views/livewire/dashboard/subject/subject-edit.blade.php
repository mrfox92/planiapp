<div key="{{ $rand }}">
    <form wire:submit.prevent="save" class="space-y-6 my-4">

        <div>
            <label for="name" class="block text-sm font-medium text-grey-700">Nombre</label>
            <input type="text" wire:model="editForm.name" id="name"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                placeholder="ingrese nombre curso">
            @error('editForm.name')
                <span class="text-red-500 text-sm"> {{ $message }} </span>
            @enderror
        </div>
        <div>
            <label for="description" class="block text-sm font-medium text-grey-700">Descripción</label>
            <textarea wire:model="editForm.description" id="description" rows="4"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                placeholder="ingrese descripción"></textarea>
            @error('editForm.description')
                <span class="text-red-500 text-sm"> {{ $message }} </span>
            @enderror
        </div>
        <div>
            <button type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Editar Asignatura
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Livewire.on('subjectUpdated', params => {
            const { title, text } = params[0];
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "La asignatura ha sido actualizada.",
                showConfirmButton: false,
                timer: 1500
            });
        });
    });
</script>
@endpush
