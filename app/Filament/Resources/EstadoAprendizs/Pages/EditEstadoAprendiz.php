<?php

namespace App\Filament\Resources\EstadoAprendizs\Pages;

use App\Filament\Resources\EstadoAprendizs\EstadoAprendizResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEstadoAprendiz extends EditRecord
{
    protected static string $resource = EstadoAprendizResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
