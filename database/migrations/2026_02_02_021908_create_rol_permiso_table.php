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
        Schema::create('rol_permiso', function (Blueprint $table) {
            $table->unsignedInteger('id_rol');
            $table->unsignedInteger('id_permiso');

            $table->primary(['id_rol', 'id_permiso']);

            $table->foreign('id_rol')
                ->references('id_rol')
                ->on('rol')
                ->cascadeOnDelete();

            $table->foreign('id_permiso')
                ->references('id_permiso')
                ->on('permiso')
                ->cascadeOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rol_permiso');
    }
};
