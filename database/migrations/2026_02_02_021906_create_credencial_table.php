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
        Schema::create('credencial', function (Blueprint $table) {
            $table->increments('id_credencial');
            $table->unsignedInteger('id_usuario')->unique();
            $table->string('contraseña_hash', 255);
            $table->dateTime('fecha_actualizacion')->useCurrent();

            $table->foreign('id_usuario')
                ->references('id_usuario')
                ->on('usuario')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credencial');
    }
};
