<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <form wire:submit.prevent="save" class="space-y-6 my-4">
        @foreach ($expectedLearning as $index => $expected)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="expectedLearning_{{ $index }}_name"
                        class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" wire:model="expectedLearning.{{ $index }}.name"
                        id="expectedLearning_{{ $index }}_name" placeholder="ingrese nombre o título del AE"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('expectedLearning.' . $index . '.name')
                        <span class="text-red-500 text-sm">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div>
                    <label for="expectedLearning_{{ $index }}_description"
                        class="block text-sm font-medium text-gray-700">Descripción (opcional)</label>
                    <textarea id="expectedLearning_{{ $index }}_description" wire:model="expectedLearning.{{ $index }}.description"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="ingrese descripción para el AE ..."></textarea>
                    @error('expectedLearning.' . $index . '.description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (count($expectedLearning) > 1)
                        <button type="button" wire:click.prevent="removeExpectedLearning({{ $index }})"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-trash-alt"></i> Eliminar
                        </button>
                    @endif
                </div>
            </div>
        @endforeach

        <div class="flex items-center justify-between mt-4">
            <button type="button" wire:click.prevent="addExpectedLearning"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-plus mr-2"></i> Añadir AE
            </button>
            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-save mr-2"></i>Guardar Aprendizaje Esperado
            </button>
        </div>
    </form>
</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Livewire.on('expectedLearningCreated', params => {
            const { title, text } = params[0];
            Swal.fire({
                title: title,
                text: text,
                icon: 'success',
                confirmButtonText: 'Ok'
            }).then((result) => {
                if(result.isConfirmed){
                    window.location.href = "{{ route('subjects.index') }}";
                }
            })
        })
    })
</script>
@endpush
