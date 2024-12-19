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
            $table->bigInteger('user_id')->unsigned();
            $table->string('tipo_documento');
            $table->string('document');
            $table->string('name');
            $table->string('last_name');
            $table->string('tel');
            $table->string('email');
            $table->string('tratamiento');
            $table->bigInteger('doctor_id')->unsigned()->nullable();
            $table->string('llamada');
            $table->string('estado');
            $table->dateTime('fecha')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('doctor_id')->references('id')->on('users');
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
