<?php

namespace Database\Seeders;

use App\Models\LearningUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LearningUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LearningUnit::factory()->count(10)->create();
    }
}
