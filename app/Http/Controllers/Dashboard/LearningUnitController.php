<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use App\Models\LearningUnit;
use Illuminate\Http\Request;

class LearningUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.learning-units.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.learning-units.create');
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
    public function show(LearningUnit $learningUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LearningUnit $learningUnit)
    {
        return view('dashboard.learning-units.edit', ['learningUnitId'  =>  $learningUnit->id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LearningUnit $learningUnit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LearningUnit $learningUnit)
    {
        //
    }
}
