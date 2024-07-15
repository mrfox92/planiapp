<?php

namespace App\Livewire\Dashboard\Course;

use App\Models\Course;
use Livewire\Component;

class CourseShow extends Component
{
    public $course;
    public $listeners = ['showCourse'];

    public function showCourse($courseId)
    {
        $this->course = Course::findOrFail($courseId);
        $this->dispatch('course-detail-shown');
    }

    public function close()
    {
        $this->reset();
        $this->dispatch('close-course-detail');
    }

    public function render()
    {
        return view('livewire.dashboard.course.course-show');
    }
}
