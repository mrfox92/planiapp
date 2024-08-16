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
        //  TODO!: debemos enlazar todo el listado de OAs a una asignatura
        //  Acto seguido debemos crear el listado de AEs de cada OA
        //  Para cada AE recordar que hay subitems, se deben agregar el listado
        //  Luego cuando creamos las unidades se deben seleccionar los OA
        //  a trabajar en cada unidad
        Schema::create('learning_objectives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('subject_id');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learning_objectives');
    }
};
