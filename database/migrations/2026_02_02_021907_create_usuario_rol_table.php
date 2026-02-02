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
        Schema::create('usuario_rol', function (Blueprint $table) {
            $table->unsignedInteger('id_usuario');
            $table->unsignedInteger('id_rol');

            $table->primary(['id_usuario', 'id_rol']);

            $table->foreign('id_usuario')
                ->references('id_usuario')
                ->on('usuario')
                ->cascadeOnDelete();

            $table->foreign('id_rol')
                ->references('id_rol')
                ->on('rol')
                ->cascadeOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_rol');
    }
};
