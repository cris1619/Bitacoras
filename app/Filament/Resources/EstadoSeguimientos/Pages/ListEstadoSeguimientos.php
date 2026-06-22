<?php

namespace App\Filament\Resources\EstadoSeguimientos\Pages;

use App\Filament\Resources\EstadoSeguimientos\EstadoSeguimientoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEstadoSeguimientos extends ListRecords
{
    protected static string $resource = EstadoSeguimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
