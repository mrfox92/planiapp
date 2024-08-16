<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use App\Models\LearningObjective;
use App\Models\Subject;
use Illuminate\Http\Request;

class LearningObjectiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Subject $subject)
    {
        return view('dashboard.objectives.create', compact('subject'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        // dd($subject->learningObjectives()->get());
        return view('dashboard.objectives.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LearningObjective $learningObjective)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LearningObjective $learningObjective)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LearningObjective $learningObjective)
    {
        //
    }
}
