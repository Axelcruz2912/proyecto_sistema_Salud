<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;
    protected $rememberTokenName = null;

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nombre',
        'apellido_p',
        'apellido_m',
        'correo',
        'id_estado',
        'id_rol',
    ];

    public function estado()
    {
        return $this->belongsTo(EstadoUsuario::class, 'id_estado');
    }

    public function credencial()
    {
        return $this->hasOne(Credencial::class, 'id_usuario');
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol', 'id_rol');
    }
}
