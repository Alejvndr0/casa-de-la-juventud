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
       /**  Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->date('fecha_nac')->nullable();
            $table->string('correo')->nullable();
            $table->string('direccion')->nullable();
            $table->timestamps();
        });*/
        Schema::create('profesores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->string('correo')->nullable();
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->timestamps();
        });
        /**Schema::create('estilos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('dificultad')->nullable();
            $table->timestamps();
        });*/
        Schema::create('clases', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->text('descripcion')->nullable();
            $table->time('hora_inicio')->nullable();
            $table->time('hora_fin')->nullable();
            $table->unsignedBigInteger('id_profesor')->nullable();
            $table->foreign('id_profesor')->references('id')->on('profesores')->onDelete('set null');
            $table->timestamps();
        });
        /**Schema::create('asistencias', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_asistencia')->nullable();
            $table->string('estado_asistencia')->nullable();
            $table->unsignedBigInteger('id_estudiante')->nullable();
            $table->unsignedBigInteger('id_clase')->nullable();
            $table->foreign('id_estudiante')->references('id')->on('estudiantes')->onDelete('cascade');
            $table->foreign('id_clase')->references('id')->on('clases')->onDelete('restrict');
            $table->timestamps();
        });*/
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inscripcion')->nullable();
            $table->date('fecha_expiracion')->nullable();
            $table->date('fecha_nac')->nullable();
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->string('direccion')->nullable();
            $table->string('email')->nullable();
            $table->string('pdf')->nullable();
            $table->unsignedBigInteger('id_clase')->nullable();
            $table->foreign('id_clase')->references('id')->on('clases')->onDelete('restrict');
            $table->timestamps();
        });
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('inscripciones');
        Schema::dropIfExists('clases');
        Schema::dropIfExists('profesores');
    }
};
