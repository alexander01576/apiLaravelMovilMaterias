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
        Schema::create('pase_listas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha');
            $table->bigInteger('id_alumno');
            $table->bigInteger('id_materia');
            $table->boolean('asistencia');
            $table->foreign('id_alumno')->references('id')->on('alumnos');
            $table->foreign('id_materia')->references('id')->on('materias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pase_listas');
    }
};
