<?php

namespace App\Livewire\Dashboard\Learning;

use App\Models\LearningUnit;
use App\Models\Subject;
use Livewire\Component;

class LearningUnitsCreate extends Component
{
    public $rand;
    public $subjects;
    public $createForm = [
        'title'         =>  NULL,
        'number'        =>  NULL,
        'description'   =>  NULL,
        'year'          =>  NULL,
        'subject_id'    =>  NULL,
    ];

    protected $rules = [
        'createForm.title'          =>  'required|string|max:255',
        'createForm.number'         =>  'required|integer|min:1|max:20',
        'createForm.description'    =>  'nullable|string',
        'createForm.year'           =>  'required|integer|min:2000',
        'createForm.subject_id'     =>  'required|exists:subjects,id'
    ];

    protected $validationAttributes = array(
        'createForm.title'          =>  'titulo',
        'createForm.number'         =>  'numero',
        'createForm.description'    =>  'descripción',
        'createForm.year'           =>  'año',
        'createForm.subject_id'     =>  'id asignatura'
    );

    public function mount()
    {
        $this->rand = rand();
        $this->subjects = Subject::all();
    }

    public function save()
    {
        $this->validate();

        LearningUnit::create([
            'title'         =>  $this->createForm['title'],
            'number'        =>  $this->createForm['number'],
            'description'   =>  $this->createForm['description'] ?? '',
            'year'          =>  $this->createForm['year'],
            'subject_id'    =>  $this->createForm['subject_id']
        ]);

        $this->rand = rand();
        $this->dispatch('learningUnitCreated', [
            'title' => 'Unidad aprendizaje añadida!',
            'text'  => 'La unidad de aprendizaje ha sido agregada con éxito',
        ]);

        $this->reset('createForm');
        $this->resetErrorBag();

    }

    public function render()
    {
        return view('livewire.dashboard.learning.learning-units-create', [
            'subjects'  =>  $this->subjects
        ]);
    }
}
