<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpectedLearning extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'learning_objective_id'
    ];

    //  un AE pertenece a un OA
    public function learningObjective()
    {
        return $this->belongsTo(LearningObjective::class);
    }
}
