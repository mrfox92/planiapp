<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //  se relaciona el instrumento de evaluación con la actividad
        //  TODO: evaluar si es necesario realizar relación muchos a muchos
        Schema::create('assessment_instruments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('assessment_activity_id');
            $table->foreign('assessment_activity_id')->references('id')->on('assessment_activities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessment_instruments');
    }
};
