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
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->string('nombre', 50);
            $table->string('apellido_p', 50);
            $table->string('apellido_m', 50)->nullable();
            $table->string('correo', 100)->unique();
            $table->unsignedInteger('id_estado');
            $table->dateTime('fecha_registro')->useCurrent();

            $table->foreign('id_estado')
                ->references('id_estado')
                ->on('estado_usuario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
