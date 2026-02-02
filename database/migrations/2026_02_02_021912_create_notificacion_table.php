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
        Schema::create('notificacion', function (Blueprint $table) {
            $table->increments('id_notificacion');
            $table->unsignedInteger('id_usuario');
            $table->unsignedInteger('id_tipo_notificacion');
            $table->dateTime('fecha_hora')->useCurrent();
            $table->boolean('leida')->default(0);

            $table->foreign('id_usuario')
                ->references('id_usuario')
                ->on('usuario');

            $table->foreign('id_tipo_notificacion')
                ->references('id_tipo_notificacion')
                ->on('tipo_notificacion');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificacion');
    }
};
