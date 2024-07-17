<?php

namespace App\Livewire\Dashboard\Teacher;

use App\Models\Teacher;
use Livewire\Component;
use Livewire\WithPagination;

class TeacherList extends Component
{
    use WithPagination;

    protected $listeners = ['deleteTeacher'];

    public function deleteTeacher($teacherId)
    {
        $teacher = Teacher::findOrFail($teacherId);
        $teacher->delete();

        $this->dispatch('teacherDeleted');

    }

    public function render()
    {
        $teachers = Teacher::orderBy('id', 'desc')->paginate(10);
        return view('livewire.dashboard.teacher.teacher-list', [
            'teachers'  =>  $teachers
        ]);
    }
}
