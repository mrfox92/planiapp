<?php

namespace App\Livewire\Dashboard\Learning;

use App\Models\LearningUnit;
use Livewire\Component;
use Illuminate\Support\Str;

class LearningUnitsList extends Component
{
    protected $listeners = ['deleteLearningUnit'];

    public function getShortDescription($description)
    {
        return Str::limit($description, 50);
    }

    public function deleteLearningUnit($learningUnitId)
    {
        $learningUnit = LearningUnit::findOrFail($learningUnitId);
        $learningUnit->delete();
        $this->dispatch('learningUnitDeleted');
    }

    public function render()
    {
        $learningUnits = LearningUnit::with('subject')->orderBy('id', 'desc')->paginate(10);
        return view('livewire.dashboard.learning.learning-units-list', [
            'learningUnits' => $learningUnits
        ]);
    }
}
