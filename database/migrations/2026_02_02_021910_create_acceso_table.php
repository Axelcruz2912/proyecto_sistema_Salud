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
        Schema::create('acceso', function (Blueprint $table) {
            $table->increments('id_acceso');
            $table->unsignedInteger('id_usuario');
            $table->string('direccion_ip', 45);
            $table->dateTime('fecha_hora')->useCurrent();
            $table->boolean('exito')->nullable();

            $table->foreign('id_usuario')
                ->references('id_usuario')
                ->on('usuario');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acceso');
    }
};
