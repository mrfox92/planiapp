<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    //  obtener todas las asignaturas de cada curso
    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
}
