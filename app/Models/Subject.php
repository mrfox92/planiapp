<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    //  obtener todos los cursos que tiene la asignatura
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function learningUnits()
    {
        return $this->hasMany(LearningUnit::class);
    }
}
