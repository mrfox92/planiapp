<?php

namespace App\Livewire\Dashboard\Subject;

use App\Models\Subject;
use Livewire\Component;

class SubjectEdit extends Component
{
    public $subjectId;
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

    public function mount($subjectId)
    {
        $this->rand = rand();
        $subject = subject::findOrFail($subjectId);
        $this->subjectId = $subject->id;
        $this->editForm = [
            'name'          =>  $subject->name,
            'description'   =>  $subject->description
        ];
    }

    public function save()
    {
        $this->validate();
        $subject = Subject::findOrFail($this->subjectId);
        $subject->update([
            'name'          =>  $this->editForm['name'],
            'description'   =>  $this->editForm['description']
        ]);

        $this->rand = rand();
        $this->dispatch('subjectUpdated', [
            'title' => 'Asignatura Actualizada!',
            'text'  => 'La asignatura ha sido actualizada con éxito',
        ]);

        // Volver a montar el componente para recargar los datos
        $this->mount($this->subjectId);
    }

    public function render()
    {
        return view('livewire.dashboard.subject.subject-edit');
    }
}
