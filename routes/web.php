<?php

use App\Http\Controllers\Dashboard\ExpectedLearningController;
use App\Http\Controllers\Dashboard\LearningObjectiveController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function() {

    Route::get('/', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    Route::resources([
        'courses'           =>  App\Http\Controllers\Dashboard\CourseController::class,
        'teachers'          =>  App\Http\Controllers\Dashboard\TeacherController::class,
        'subjects'          =>  App\Http\Controllers\Dashboard\SubjectController::class,
        'learning-units'    =>  App\Http\Controllers\Dashboard\LearningUnitController::class,
        'objectives'        =>  App\Http\Controllers\Dashboard\LearningObjectiveController::class
    ]);

    Route::get('subjects/{subject}/objectives/create', [LearningObjectiveController::class, 'create'])->name('learning-objectives.create');
    // Route::post('subjects/{subject}/objectives', [LearningObjectiveController::class, 'store'])->name('learning-objectives.store');
    Route::get('subjects/{subject}/objectives/show', [LearningObjectiveController::class, 'show'])->name('learning-objectives.show');

    Route::get('objectives/{objective}/expected/create', [ExpectedLearningController::class, 'create'])->name('expected-learnings.create');
});

require __DIR__.'/auth.php';
