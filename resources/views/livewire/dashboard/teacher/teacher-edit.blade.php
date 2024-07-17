<div key="{{ $rand }}">
    <form wire:submit.prevent="save" class="space-y-6 my-4">

        <div>
            <label for="name" class="block text-sm font-medium text-grey-700">Nombre</label>
            <input type="text" wire:model="editForm.name" id="name"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                placeholder="ingrese nombre profesor">
            @error('editForm.name')
                <span class="text-red-500 text-sm"> {{ $message }} </span>
            @enderror
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-grey-700">Correo electrónico</label>
            <input type="email" wire:model="editForm.email" id="email"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                placeholder="ingrese email profesor">
            @error('editForm.email')
                <span class="text-red-500 text-sm"> {{ $message }} </span>
            @enderror
        </div>
        <div>
            <button type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Editar profesor
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Livewire.on('teacherUpdated', params => {
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
