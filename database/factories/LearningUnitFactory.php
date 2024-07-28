<?php

namespace Database\Factories;

use App\Models\LearningUnit;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LearningUnit>
 */
class LearningUnitFactory extends Factory
{
    protected $Model = LearningUnit::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subject = Subject::inRandomOrder()->first();
        if (!$subject) {
            throw new \Exception("NO hay asignaturas disponibles en la base de datos");
        }

        return [
            'title'         =>  $this->faker->words(3, true),
            'number'        =>  $this->faker->numberBetween(1, 4),
            'description'   =>  $this->faker->paragraph,
            'year'          =>  $this->faker->numberBetween(2023, 2024),
            'subject_id'    =>  $subject->id
        ];
    }
}
