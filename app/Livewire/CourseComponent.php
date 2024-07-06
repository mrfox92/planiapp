<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseComponent extends Component
{
    public $courses;

    public function mount()
    {
        $this->courses = Course::all();
    }

    public function render()
    {
        return view('livewire.course-component');
    }
}
