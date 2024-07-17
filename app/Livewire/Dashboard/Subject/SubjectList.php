<?php

namespace App\Livewire\Dashboard\Subject;

use App\Models\Subject;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class SubjectList extends Component
{
    use WithPagination;

    protected $listeners = ['deleteSubject'];

    public function getShortDescription($description)
    {
        return Str::limit($description, 50);
    }

    public function deleteSubject($subjectId)
    {
        $subject = Subject::findOrFail($subjectId);
        $subject->delete();

        $this->dispatch('subjectDeleted');

    }

    public function render()
    {
        $subjects = Subject::orderBy('id', 'desc')->paginate(10);
        return view('livewire.dashboard.subject.subject-list', [
            'subjects'  =>  $subjects
        ]);
    }
}
