<?php

namespace App\Livewire\Dashboard\Teacher;

use App\Models\Teacher;
use Livewire\Component;

class TeacherEdit extends Component
{
    public $teacherId;
    public $rand;
    public $editForm = [
        'name'  =>  NULL,
        'email' =>  NULL
    ];

    protected $rules = [
        'editForm.name'   =>  'required|string|max:255',
        'editForm.email'  =>  'required|email|unique:teachers,email'
    ];

    protected $validationAttributes = [
        'editForm.name'   =>  'nombre',
        'editForm.email'  =>  'correo electrónico'
    ];

    public function mount($teacherId)
    {
        $this->rand = rand();
        $teacher = Teacher::findOrFail($teacherId);
        $this->teacherId = $teacher->id;
        $this->editForm = [
            'name'  =>  $teacher->name,
            'email' =>  $teacher->email
        ];
    }

    public function save()
    {
        $this->validate();
        $teacher = Teacher::findOrFail($this->teacherId);
        $teacher->update([
            'name'  =>  $this->editForm['name'],
            'email' =>  $this->editForm['email'],
        ]);

        $this->rand = rand();

        $this->dispatch('teacherUpdated', [
            'title' => 'Profesor Actualizado!',
            'text'  => 'Profesor ha sido actualizado con éxito',
        ]);

        $this->mount($this->teacherId);

    }

    public function render()
    {
        return view('livewire.dashboard.teacher.teacher-edit');
    }
}
