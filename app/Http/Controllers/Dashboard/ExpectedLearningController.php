<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use App\Models\ExpectedLearning;
use App\Models\LearningObjective;
use Illuminate\Http\Request;

class ExpectedLearningController extends Controller
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
    public function create(LearningObjective $objective)
    {
        return view('dashboard.expected.create', compact('objective'));
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
    public function show(ExpectedLearning $expectedLearning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExpectedLearning $expectedLearning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExpectedLearning $expectedLearning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExpectedLearning $expectedLearning)
    {
        //
    }
}
