<?php

namespace App\Filament\Resources\EstadoBitacoras\Pages;

use App\Filament\Resources\EstadoBitacoras\EstadoBitacoraResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEstadoBitacoras extends ListRecords
{
    protected static string $resource = EstadoBitacoraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
