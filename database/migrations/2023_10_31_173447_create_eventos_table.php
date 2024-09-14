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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();

            $table->string("title", 255);
            $table->bigInteger("user_id");
            $table->bigInteger("selector");
            $table->bigInteger("doctor_id");
            $table->text("descripcion");
            $table->date("start");
            $table->time("hora_cita");
            
            $table->string("color");
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
