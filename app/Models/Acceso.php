<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acceso extends Model
{
    protected $table = 'acceso';
    protected $primaryKey = 'id_acceso';
    public $timestamps = false;

    protected $fillable = [
        'id_usuario',
        'direccion_ip',
        'fecha_hora',
        'exito'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}

