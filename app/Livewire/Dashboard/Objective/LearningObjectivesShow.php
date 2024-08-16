<?php

namespace App\Livewire\Dashboard\Objective;

use App\Models\LearningObjective;
use Livewire\Component;
use Illuminate\Support\Str;

class LearningObjectivesShow extends Component
{
    public $subject;

    public function mount($subject)
    {
        $this->subject = $subject;
    }

    public function getShortDescription($description)
    {
        return Str::limit($description, 50);
    }

    public function render()
    {
        return view('livewire.dashboard.objective.learning-objectives-show', [
            'objectives'    =>  $this->subject->learningObjectives()->with('expectedLearning')->paginate(2)
        ]);
    }
}
