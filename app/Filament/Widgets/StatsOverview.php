<?php

namespace App\Filament\Widgets;

use App\Models\Aprendiz;
use App\Models\BitacoraEvidencia;
use App\Models\Seguimiento;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [

            Stat::make(
                'Total Aprendices',
                Aprendiz::count()
            )
                ->description('Aprendices registrados')
                ->descriptionIcon('heroicon-m-users'),

            Stat::make(
                'Seguimientos',
                Seguimiento::count()
            )
                ->description('Seguimientos creados')
                ->descriptionIcon('heroicon-m-clipboard-document-list'),

            Stat::make(
                'Bitácoras',
                BitacoraEvidencia::count()
            )
                ->description('Bitácoras generadas')
                ->descriptionIcon('heroicon-m-document-text'),

            Stat::make(
                'Pendientes',
                BitacoraEvidencia::where('estado_id', 1)->count()
            )
                ->description('Bitácoras pendientes')
                ->descriptionIcon('heroicon-m-clock'),

        ];
    }
}