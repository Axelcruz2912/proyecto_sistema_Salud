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
        Schema::create('recuperacion_cuenta', function (Blueprint $table) {
            $table->increments('id_recuperacion');
            $table->unsignedInteger('id_usuario');
            $table->string('token', 100)->unique();
            $table->dateTime('fecha_solicitud')->useCurrent();
            $table->dateTime('fecha_expiracion');
            $table->boolean('usada')->default(0);

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
        Schema::dropIfExists('recuperacion_cuenta');
    }
};
