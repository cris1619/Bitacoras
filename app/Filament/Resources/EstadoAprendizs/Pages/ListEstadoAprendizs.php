<?php

namespace App\Filament\Resources\EstadoAprendizs\Pages;

use App\Filament\Resources\EstadoAprendizs\EstadoAprendizResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEstadoAprendizs extends ListRecords
{
    protected static string $resource = EstadoAprendizResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
