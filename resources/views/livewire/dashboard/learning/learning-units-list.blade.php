<div>

    <div class="mb-4 flex justify-between items-center mt-4">
        <a href="{{ route('learning-units.create') }}" class="ml-auto bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-plus mr-2"></i>{{ __('messages.learning.Add New') }}
        </a>
    </div>

    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-md sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 sm:px-6 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-4 py-2 sm:px-6 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
                            <th class="px-4 py-2 sm:px-6 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Asignatura</th>
                            <th class="px-4 py-2 sm:px-6 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Año</th>
                            <th class="px-4 py-2 sm:px-6 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($learningUnits as $learningUnit)
                            <tr>
                                <td class="px-4 py-2 sm:px-6 sm:py-4 whitespace-nowrap">{{ $learningUnit->id }}</td>
                                <td class="px-4 py-2 sm:px-6 sm:py-4 whitespace-nowrap">{{ $learningUnit->title }}</td>
                                <td class="px-4 py-2 sm:px-6 sm:py-4 whitespace-nowrap">{{ $learningUnit->subject->name }}</td>
                                <td class="px-4 py-2 sm:px-6 sm:py-4 whitespace-nowrap">{{ $learningUnit->year }}</td>
                                <td class="px-4 py-2 sm:px-6 sm:py-4 whitespace-nowrap">

                                    <button onclick="showLearningUnitDetail({{ $learningUnit }})" class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-2 px-3 rounded focus:outline-none focus:shadow-outline"><i class="fas fa-eye"></i></button>
                                    <a href="{{ route('learning-units.edit', $learningUnit->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2.5 px-3 rounded focus:outline-none focus:shadow-outline"><i class="fas fa-edit"></i></i></a>
                                    <button onclick="confirmDelete({{ $learningUnit }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded focus:outline-none focus:shadow-outline"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="mt-4">
        {{ $learningUnits->links() }} <!-- Mostrar la paginación -->
    </div>
</div>

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
<script>
    function confirmDelete(learningUnit) {

        Swal.fire({
              title: '¿Estás seguro?',
              text: `Deseas eliminar la unidad de aprendizaje ${ learningUnit.title }?`,
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, eliminarlo!',
              cancelButtonText: 'Cancelar',
            }).then((result) => {
              if (result.isConfirmed) {
                Livewire.dispatch('deleteLearningUnit', { learningUnitId: learningUnit.id });
              }
            });
    }

    function showLearningUnitDetail(learningUnit) {

        displayDescription = learningUnit.description ? learningUnit.description : "Descripción no disponible";

        Swal.fire({
            title: `<h1 class="text-xl font-bold text-gray-600">Detalle Unidad de Aprendizaje</h1>`,
            html: `
                <h2 style="text-align: left;" class="text-xl text-gray-600 my-2"><strong>Titulo unidad:</strong> ${learningUnit.title}</h2>
                <div style="text-align: justify;">
                    <p class="text-gray-400 mb-2"><strong class="text-gray-600">Descripción:</strong> ${displayDescription}</p>
                </div>
                <h3 style="text-align: left;" class="text-l text-gray-600 my-2"><strong>Asignatura:</strong> ${learningUnit.subject.name} (${learningUnit.year})</h3>
                <br>
                <hr>
            `,
            icon: 'info',
            confirmButtonText: 'Cerrar'
        });
    }

    Livewire.on('learningUnitDeleted', () => {
        Swal.fire({
                position: "top-end",
                icon: "success",
                title: "La unidad de aprendizaje ha sido eliminada con éxito",
                showConfirmButton: false,
                timer: 1500
            });
    });
</script>

@endpush
