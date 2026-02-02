<?php

namespace Database\Seeders;

use App\Models\EstadoUsuario;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EstadoUsuario::create(['nombre_estado' => 'Activo']);
        EstadoUsuario::create(['nombre_estado' => 'Bloqueado']);
        EstadoUsuario::create(['nombre_estado' => 'Pendiente']);
    }
}
