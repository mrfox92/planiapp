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

        Swal.fire({
            title: `<h1 class="text-xl font-bold text-gray-600">Detalle Asignatura</h1>`,
            html: `
                <h2 style="text-align: left;" class="text-xl text-gray-600 my-2"><strong>Nombre:</strong> ${subject.name}</h2>
                <div style="text-align: justify;">
                    <p class="text-gray-400 mb-2"><strong class="text-gray-600">Descripción:</strong> ${subject.description}</p>
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
