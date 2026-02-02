<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Credencial extends Model
{
    protected $table = 'credencial';
    protected $primaryKey = 'id_credencial';
    public $timestamps = false;

    protected $fillable = [
        'id_usuario',
        'contraseña_hash'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}
