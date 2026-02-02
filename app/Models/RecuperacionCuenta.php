<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecuperacionCuenta extends Model
{
    protected $table = 'recuperacion_cuenta';
    protected $primaryKey = 'id_recuperacion';
    public $timestamps = false;

    protected $fillable = [
        'id_usuario',
        'token',
        'fecha_expiracion',
        'usada'
    ];
}
