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
        Schema::create('formularios', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('tipo_documento');
            $table->string('document');
            $table->string('name');
            $table->string('last_name');
            $table->string('tel');
            $table->string('email');
            $table->string('tratamiento');
            $table->integer('doctor_id')->nullable();
            $table->string('llamada');
            $table->string('estado');
            $table->dateTime('fecha')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formularios');
    }
};
