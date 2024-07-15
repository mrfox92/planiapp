<?php

namespace App\Livewire\Dashboard\Course;

use App\Models\Course;
use Livewire\Component;

class CourseEdit extends Component
{
    public $courseId;
    public $rand;
    public $editForm = [
        'name'          =>  NULL,
        'description'   =>  NULL
    ];

    protected $rules = [
        'editForm.name'          =>  'required|string|max:255',
        'editForm.description'   =>  'required|string|max:1000'
    ];

    protected $validationAttributes = array(
        'editForm.name'           =>  'nombre',
        'editForm.description'    =>  'descripción'
    );

    public function mount($courseId)
    {
        $this->rand = rand();
        $course = Course::findOrFail($courseId);
        $this->courseId = $course->id;
        $this->editForm = [
            'name'          =>  $course->name,
            'description'   =>  $course->description
        ];
    }

    public function save()
    {
        $this->validate();
        $course = Course::findOrFail($this->courseId);
        $course->update([
            'name'          =>  $this->editForm['name'],
            'description'   =>  $this->editForm['description']
        ]);

        $this->rand = rand();
        $this->dispatch('courseUpdated', [
            'title' => 'Curso Actualizado!',
            'text'  => 'El curso ha sido actualizado con éxito',
        ]);

        // Volver a montar el componente para recargar los datos
        $this->mount($this->courseId);
    }

    public function render()
    {
        return view('livewire.dashboard.course.course-edit');
    }
}
