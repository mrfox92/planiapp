<?php

namespace App\Livewire\Dashboard\Expected;

use Livewire\Component;

class ExpectedLearningCreate extends Component
{
    public $objective;

    public $expectedLearning = [
        [ 'name' => '', 'description' => '' ]
    ];

    protected $validationAttributes = array(
        'expectedLearning.*.name'           =>  'nombre',
        'expectedLearning.*.description'    =>  'descripción'
    );

    public function mount($objective)
    {
        $this->objective = $objective;
    }

    public function addExpectedLearning()
    {
        $this->expectedLearning[] = [ 'name' => '', 'description' => '' ];
    }

    public function removeExpectedLearning($index)
    {
        unset($this->expectedLearning[$index]);
        $this->expectedLearning = array_values($this->expectedLearning);
    }

    public function save()
    {
        $this->validate([
            'expectedLearning.*.name'           =>  'required|string|max:255',
            'expectedLearning.*.description'    =>  'nullable|string'
        ]);

        foreach ($this->expectedLearning as $expected) {
            $this->objective->expectedLearning()->create($expected);
        }

        $this->dispatch('expectedLearningCreated', [
            'title' => 'aprendizajes Esperados Agregados!',
            'text'  => 'Los aprendizajes esperados han sido ingresados con éxito'
        ]);
    }

    public function render()
    {
        return view('livewire.dashboard.expected.expected-learning-create');
    }
}
