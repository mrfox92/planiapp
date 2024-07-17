<?php

namespace App\Livewire\Dashboard\Course;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class CourseList extends Component
{
    use WithPagination;

    protected $listeners = ['deleteCourse'];

    public function render()
    {
        $courses = Course::orderBy('id', 'desc')->paginate(10);
        return view('livewire.dashboard.course.course-list', [
            'courses'   =>  $courses
        ]);
    }

    public function getShortDescription($description)
    {
        return Str::limit($description, 50);
    }

    public function showCourse($courseId)
    {
        $this->dispatch('showCourse', courseId: $courseId);
    }

    public function deleteCourse($courseId)
    {
        $course = Course::findOrFail($courseId);
        $course->delete();

        $this->dispatch('courseDeleted');

    }

}
