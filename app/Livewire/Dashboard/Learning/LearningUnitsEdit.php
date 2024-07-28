<?php

namespace App\Livewire\Dashboard\Learning;

use App\Models\LearningUnit;
use App\Models\Subject;
use Livewire\Component;

class LearningUnitsEdit extends Component
{
    public $learningUnitId;
    public $rand;
    public $subjects;
    public $editForm = [
        'title'         =>  NULL,
        'number'        =>  NULL,
        'description'   =>  NULL,
        'year'          =>  NULL,
        'subject_id'    =>  NULL,
    ];

    protected $rules = [
        'editForm.title'          =>  'required|string|max:255',
        'editForm.number'         =>  'required|integer|min:1|max:20',
        'editForm.description'    =>  'nullable|string',
        'editForm.year'           =>  'required|integer|min:2000',
        'editForm.subject_id'     =>  'required|exists:subjects,id'
    ];

    protected $validationAttributes = array(
        'editForm.title'          =>  'titulo',
        'editForm.number'         =>  'numero',
        'editForm.description'    =>  'descripción',
        'editForm.year'           =>  'año',
        'editForm.subject_id'     =>  'id asignatura'
    );

    public function mount($learningUnitId)
    {
        $this->rand = rand();
        $this->subjects = Subject::all();
        $learningUnit = LearningUnit::findOrFail($learningUnitId);
        $this->learningUnitId = $learningUnitId;
        $this->editForm = [
            'title'         =>  $learningUnit->title,
            'number'        =>  $learningUnit->number,
            'description'   =>  $learningUnit->description,
            'year'          =>  $learningUnit->year,
            'subject_id'    =>  $learningUnit->subject_id,
        ];

    }

    public function save()
    {
        $this->validate();
        $learningUnit = LearningUnit::findOrFail($this->learningUnitId);
        $learningUnit->update([
            'title'         =>  $this->editForm['title'],
            'number'        =>  $this->editForm['number'],
            'description'   =>  $this->editForm['description'] ?? '',
            'year'          =>  $this->editForm['year'],
            'subject_id'    =>  $this->editForm['subject_id']
        ]);

        $this->rand = rand();
        $this->dispatch('learningUnitUpdated', [
            'title' => 'Unidad de Aprendizaje Actualizada!',
            'text'  => 'La unidad de aprendizaje ha sido actualizada con éxito',
        ]);

        // Volver a montar el componente para recargar los datos
        $this->mount($this->learningUnitId);
    }

    public function render()
    {
        return view('livewire.dashboard.learning.learning-units-edit');
    }
}
