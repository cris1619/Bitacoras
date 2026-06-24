<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\BitacoraService;

class Aprendiz extends Model
{
    use SoftDeletes;

    protected $table = 'aprendices';

    protected $fillable = [
        'ficha_id',
        'estado_id',
        'vinculo_id',

        'tipo_documento',
        'documento_identidad',

        'nombres',
        'apellidos',

        'correo_electronico',
        'telefono',

        'empresa',
        'jefe_inmediato',
        'correo_empresa',
        'telefono_empresa',

        'fecha_inicio_practica',
        'fecha_fin_practica',

        'detalles_contrato',
    ];

    public function ficha()
    {
        return $this->belongsTo(
            Ficha::class,
            'ficha_id'
        );
    }

    public function estado()
    {
        return $this->belongsTo(
            EstadoAprendiz::class,
            'estado_id'
        );
    }

    public function vinculo()
    {
        return $this->belongsTo(
            VinculoFormativo::class,
            'vinculo_id'
        );
    }

    public function seguimientos()
    {
        return $this->hasMany(
            Seguimiento::class,
            'aprendiz_id'
        );
    }

    public function bitacoras()
    {
        return $this->hasMany(
            BitacoraEvidencia::class,
            'aprendiz_id'
        );
    }

    protected static function booted()
{
    static::created(function ($aprendiz) {

        BitacoraService::generarBitacoras($aprendiz);

    });
}

    }
