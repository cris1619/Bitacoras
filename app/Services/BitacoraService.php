<?php

namespace App\Services;

use App\Models\Aprendiz;
use App\Models\BitacoraEvidencia;
use Carbon\Carbon;

class BitacoraService
{
    public static function generarBitacoras(Aprendiz $aprendiz): void
{
    if (
        !$aprendiz->fecha_inicio_practica
    ) {
        return;
    }

    $fechaBitacora = Carbon::parse(
        $aprendiz->fecha_inicio_practica
    );

    $fechaBitacora->addDays(15);

    for ($i = 1; $i <= 12; $i++) {

        BitacoraEvidencia::create([

            'aprendiz_id' => $aprendiz->id,

            'estado_id' => 1,

            'numero_bitacora' => $i,

            'fecha_limite_entrega' => $fechaBitacora->copy(),

        ]);

        $fechaBitacora->addDays(15);
    }
}
}