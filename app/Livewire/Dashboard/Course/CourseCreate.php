<?php

namespace App\Livewire\Dashboard\Course;

use App\Models\Course;
use Livewire\Component;

class CourseCreate extends Component
{
    public $rand;
    public $createForm = [
        'name'          =>  NULL,
        'description'   =>  NULL,
    ];

    protected $rules = [
        'createForm.name'          =>  'required|string|max:255',
        'createForm.description'   =>  'required|string|max:1000'
    ];

    protected $validationAttributes = array(
        'createForm.name'           =>  'nombre',
        'createForm.description'    =>  'descripción'
    );

    public function mount()
    {
        $this->rand = rand();
    }

    public function save()
    {
        $this->validate();

        Course::create([
            'name'          =>  $this->createForm['name'],
            'description'   =>  $this->createForm['description']
        ]);

        $this->rand = rand();
        $this->dispatch('courseCreated', [
            'title' => 'Curso añadido!',
            'text'  => 'El curso ha sido agregado con éxito',
        ]);

        $this->reset('createForm');
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.dashboard.course.course-create');
    }
}
