<div>

    <div class="mb-4 flex justify-between items-center mt-4">
        <a href="{{ route('courses.create') }}" class="ml-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            {{ __('messages.course.Add New Course') }}
        </a>
    </div>

    <div class="overflow-hidden bg-white shadow sm:rounded-lg my-4">
        <div class="p-6 bg-white border-b border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ID
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Descripción
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($courses as $course)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $course->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $course->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $this->getShortDescription( $course->description ) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button onclick="showCourseDetail({{ $course }})" class="text-indigo-600 hover:text-indigo-900">{{ __('messages.course.View') }}</button>
                                <a href="{{ route('courses.edit', $course->id) }}" class="text-blue-600 hover:text-blue-900 ml-2">{{ __('messages.course.Edit') }}</a>
                                <button onclick="confirmDelete({{ $course }})" class="text-red-600 hover:text-red-900 ml-2">{{ __('messages.course.Delete') }}</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- incluimos el componente con el modal para mostrar el detalle del curso --}}
            {{-- <div wire:loading wire:target="showCourse">
                Cargando vista...
            </div> --}}
            {{-- @livewire('dashboard.course.course-show') --}}
        </div>
    </div>
    <div class="mt-4">
        {{ $courses->links() }} <!-- Mostrar la paginación -->
    </div>
</div>

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
<script>
    function confirmDelete(course) {

        Swal.fire({
              title: '¿Estás seguro?',
              text: `Deseas eliminar curso ${ course.name }?`,
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, eliminarlo!',
              cancelButtonText: 'Cancelar',
            }).then((result) => {
              if (result.isConfirmed) {
                Livewire.dispatch('deleteCourse', { courseId: course.id });
              }
            });
    }

    function showCourseDetail(course) {

        Swal.fire({
            title: `<h1 class="text-xl font-bold text-gray-600">Detalle Curso</h1>`,
            html: `
                <h2 style="text-align: left;" class="text-xl text-gray-600 my-2"><strong>Curso:</strong> ${course.name}</h2>
                <div style="text-align: justify;">
                    <p class="text-gray-400 mb-2"><strong class="text-gray-600">Descripción:</strong> ${course.description}</p>
                </div>
                <br>
                <hr>
            `,
            icon: 'info',
            confirmButtonText: 'Cerrar'
        });
    }

    Livewire.on('courseDeleted', () => {
        Swal.fire({
                position: "top-end",
                icon: "success",
                title: "El curso ha sido eliminado con éxito",
                showConfirmButton: false,
                timer: 1500
            });
    });
</script>

@endpush
