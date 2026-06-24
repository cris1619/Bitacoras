<?php

namespace App\Filament\Widgets;

use App\Models\BitacoraEvidencia;
use Filament\Widgets\ChartWidget;

class BitacorasChart extends ChartWidget
{
    protected ?string $heading = 'Estado de Bitácoras';

    protected function getData(): array
    {
        $pendientes = BitacoraEvidencia::whereNull(
            'fecha_entrega'
        )
        ->whereDate(
            'fecha_limite_entrega',
            '>=',
            now()
        )
        ->count();

        $vencidas = BitacoraEvidencia::whereNull(
            'fecha_entrega'
        )
        ->whereDate(
            'fecha_limite_entrega',
            '<',
            now()
        )
        ->count();

        $entregadas = BitacoraEvidencia::whereNotNull(
            'fecha_entrega'
        )->count();

        return [

            'datasets' => [
                [
                    'label' => 'Bitácoras',

                    'data' => [
                        $pendientes,
                        $vencidas,
                        $entregadas,
                    ],
                ],
            ],

            'labels' => [
                'Pendientes',
                'Vencidas',
                'Entregadas',
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}