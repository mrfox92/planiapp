<?php

namespace App\Livewire\Dashboard\Objective;

use Livewire\Component;

class LearningObjectivesCreate extends Component
{
    public $subject;

    public $objectives = [
        ['name' => '', 'description' => '']
    ];

    protected $validationAttributes = array(
        'objectives.*.name'           =>  'nombre',
        'objectives.*.description'    =>  'descripción'
    );

    public function mount($subject)
    {
        $this->subject = $subject;
    }

    public function addObjective()
    {
        $this->objectives[] = ['name' => '', 'description' => ''];
    }

    public function removeObjective($index)
    {
        unset($this->objectives[$index]);
        $this->objectives = array_values($this->objectives);
    }

    public function save()
    {
        $this->validate([
            'objectives.*.name'         =>  'required|string|max:255',
            'objectives.*.description'  =>  'nullable|string'
        ]);

        foreach ($this->objectives as $objective) {
            $this->subject->learningObjectives()->create($objective);
        }

        $this->dispatch('learningObjectiveCreated', [
            'title' => 'Unidades Aprendizaje Agregadas!',
            'text'  => 'Las unidades de aprendizaje han sido ingresadas con éxito',
        ]);
    }

    public function render()
    {
        return view('livewire.dashboard.objective.learning-objectives-create');
    }
}
