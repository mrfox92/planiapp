<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningUnit extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'number',
        'description',
        'year',
        'subject_id'
    ];

    // una unidad de aprendizaje pertenece a una asignatura
    //  mienstras que una asignatura puede tener 1 a muchas unidades
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
