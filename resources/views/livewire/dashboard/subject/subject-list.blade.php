<div>

    <div class="mb-4 flex justify-between items-center mt-4">
        <a href="{{ route('subjects.create') }}" class="ml-auto bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-plus mr-2"></i>{{ __('messages.subject.Add New') }}
        </a>
    </div>

    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-md sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 sm:px-6 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-4 py-2 sm:px-6 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                            <th class="px-4 py-2 sm:px-6 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
                            <th class="px-4 py-2 sm:px-6 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($subjects as $subject)
                            <tr>
                                <td class="px-4 py-2 sm:px-6 sm:py-4 whitespace-nowrap">{{ $subject->id }}</td>
                                <td class="px-4 py-2 sm:px-6 sm:py-4 whitespace-nowrap">{{ $subject->name }}</td>
                                <td class="px-4 py-2 sm:px-6 sm:py-4 whitespace-nowrap">{{ $this->getShortDescription($subject->description) }}</td>
                                <td class="px-4 py-2 sm:px-6 sm:py-4 whitespace-nowrap">

                                    <button onclick="showSubjectDetail({{ $subject }})" class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-2 px-3 rounded focus:outline-none focus:shadow-outline"><i class="fas fa-eye"></i></button>
                                    <a href="{{ route('subjects.edit', $subject->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2.5 px-3 rounded focus:outline-none focus:shadow-outline"><i class="fas fa-edit"></i></i></a>
                                    <a href="{{ route('learning-objectives.create', $subject->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2.5 px-3 rounded focus:outline-none focus:shadow-outline"><i class="fas fa-list"></i></i></a>
                                    @if ( count($subject->learningObjectives) > 0 )
                                        <a href="{{ route('learning-objectives.show', $subject->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2.5 px-3 rounded focus:outline-none focus:shadow-outline"><i class="fas fa-check-to-slot"></i></a>
                                    @endif
                                    <button onclick="confirmDelete({{ $subject }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded focus:outline-none focus:shadow-outline"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="mt-4">
        {{ $subjects->links() }} <!-- Mostrar la paginación -->
    </div>
</div>

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
<script>
    function confirmDelete(subject) {

        Swal.fire({
              title: '¿Estás seguro?',
              text: `¿Deseas eliminar asignatura ${ subject.name } ?`,
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, eliminarla!',
              cancelButtonText: 'Cancelar',
            }).then((result) => {
              if (result.isConfirmed) {
                Livewire.dispatch('deleteSubject', { subjectId: subject.id });
              }
            });
    }

    function showSubjectDetail(subject) {
        let list_items = '';
        if (subject.learning_objectives.length !== 0)
        {
            list_items += '<ul class="max-w-lg mx-auto mt-10 bg-white shadow rounded-lg divide-y divide-gray-200">';
            subject.learning_objectives.forEach(objective => {
                list_items += `<li class="py-4 px-6 flex flex-col">
                        <span class="bg-blue-100 text-blue-800 text-base font-semibold mr-2 px-2.5 py-0.5 rounded">
                            ${ objective.name }
                        </span>
                        <span class="text-gray-600 text-sm mt-2">
                            ${ objective.description ? objective.description : 'Sin descripción' }
                        </span>
                    </li>
                    `;
            });
            list_items += '</ul>';
        } else {
            list_items += list_items += '<ul class="max-w-lg mx-auto mt-10 bg-white shadow rounded-lg divide-y divide-gray-200">';
            list_items += `<li class="py-4 px-6 flex flex-col">
                        <span class="bg-blue-100 text-blue-800 text-base font-semibold mr-2 px-2.5 py-0.5 rounded">
                            No hay datos
                        </span>
                    </li>`;
            list_items += '</ul>';
        }


        Swal.fire({
            title: `<h1 class="text-xl font-bold text-gray-600">Detalle Asignatura</h1>`,
            html: `
                <h2 style="text-align: left;" class="text-xl text-gray-600 my-2"><strong>Nombre:</strong> ${subject.name}</h2>
                <div style="text-align: justify;">
                    <p class="text-gray-400 mb-2"><strong class="text-gray-600">Descripción:</strong> ${subject.description}</p>
                </div>
                <div class="bg-gray-100 font-sans">
                    ${ list_items }
                </div>
                <br>
                <hr>
            `,
            icon: 'info',
            confirmButtonText: 'Cerrar'
        });
    }

    Livewire.on('deleteSubject', () => {
        Swal.fire({
                position: "top-end",
                icon: "success",
                title: "La asignatura ha sido eliminada con éxito",
                showConfirmButton: false,
                timer: 1500
            });
    });
</script>

@endpush
