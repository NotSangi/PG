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
        Schema::create('tratamiento_cita', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cita_id')->unsigned();
            $table->bigInteger('tratamiento_id')->unsigned();
            $table->timestamps(); 

            $table->foreign('cita_id')->references('id')->on('formularios');
            $table->foreign('tratamiento_id')->references('id')->on('tratamientos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tratamiento_cita');
    }
};
