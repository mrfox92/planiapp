<?php

namespace App\Livewire\Dashboard\Subject;

use App\Models\Subject;
use Livewire\Component;

class SubjectCreate extends Component
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

        Subject::create([
            'name'          =>  $this->createForm['name'],
            'description'   =>  $this->createForm['description']
        ]);

        $this->rand = rand();
        $this->dispatch('subjectCreated', [
            'title' => 'Asignatura añadida!',
            'text'  => 'La asignatura ha sido agregada con éxito',
        ]);

        $this->reset('createForm');
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.dashboard.subject.subject-create');
    }
}
