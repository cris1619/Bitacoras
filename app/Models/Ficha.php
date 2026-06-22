<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProgramaFormacion;

class Ficha extends Model
{
    protected $table = 'fichas';

    protected $fillable = [
        'numero_ficha',
        'programa_id',
    ];

    public function programa()
    {
        return $this->belongsTo(
            ProgramaFormacion::class,
            'programa_id'
        );
    }

    public function aprendices()
    {
        return $this->hasMany(
            Aprendiz::class,
            'ficha_id'
        );
    }
}