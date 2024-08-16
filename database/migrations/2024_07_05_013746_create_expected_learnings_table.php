<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Los AE tienen uno o varios criterios
     * cada criterio tiene uno o varios
     * objetivos de aprendizaje genéricos.
     * estos se identifican por medio de una letra
     * pudiendo ser OBJETIVOS DE APRENDIZAJE GENÉRICOS DE LA FORMACIÓN TÉCNICO-PROFESIONAL
     * u objetivos de aprendizaje genéricos generales (establecer tabla de categorización)
     */

    public function up(): void
    {
        Schema::create('expected_learnings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('learning_objective_id');
            $table->foreign('learning_objective_id')->references('id')->on('learning_objectives');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expected_learnings');
    }
};
