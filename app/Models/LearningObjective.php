<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningObjective extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'subject_id',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    //   un OA puede tener uno o muchos AE
    public function expectedLearning()
    {
        return $this->hasMany(ExpectedLearning::class);
    }
}
