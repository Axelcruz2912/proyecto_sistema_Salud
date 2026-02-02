<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoUsuario extends Model
{
    protected $table = 'estado_usuario';
    protected $primaryKey = 'id_estado';
    public $timestamps = false;

    protected $fillable = [
        'nombre_estado'
    ];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_estado');
    }
}
