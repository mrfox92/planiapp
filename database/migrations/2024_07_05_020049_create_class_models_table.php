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
        Schema::create('class_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number');
            $table->integer('duration');    // hrs pedagógicas
            $table->unsignedBigInteger('learning_unit_id');
            $table->foreign('learning_unit_id')->references('id')->on('learning_units');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_models');
    }
};
