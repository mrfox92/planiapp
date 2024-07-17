<?php

namespace App\Livewire\Dashboard\Teacher;

use App\Models\Teacher;
use Livewire\Component;

class TeacherCreate extends Component
{
    public $rand;
    public $createForm = [
        'name'  =>  NULL,
        'email' =>  NULL
    ];

    protected $rules = [
        'createForm.name'   =>  'required|string|max:255',
        'createForm.email'  =>  'required|email|unique:teachers,email'
    ];

    protected $validationAttributes = [
        'createForm.name'   =>  'nombre',
        'createForm.email'  =>  'correo electrónico'
    ];

    public function mount()
    {
        $this->rand = rand();
    }

    public function save()
    {
        $this->validate();
        Teacher::create([
            'name'  =>  $this->createForm['name'],
            'email'  =>  $this->createForm['email'],
        ]);
        $this->rand = rand();
        $this->dispatch('teacherCreated', [
            'title' => 'Profesor creado con éxito.',
            'text'  => 'Profesor ha sido agregado con éxito',
        ]);
        $this->reset('createForm');
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.dashboard.teacher.teacher-create');
    }
}
