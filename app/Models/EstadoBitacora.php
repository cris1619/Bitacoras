<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoBitacora extends Model
{
    protected $table = 'estados_bitacora';

    protected $fillable = [
        'nombre_estado',
    ];

    public function bitacoras()
    {
        return $this->hasMany(
            BitacoraEvidencia::class,
            'estado_id'
        );
    }
}