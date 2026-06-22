<?php

namespace App\Filament\Resources\EstadoSeguimientos\Pages;

use App\Filament\Resources\EstadoSeguimientos\EstadoSeguimientoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEstadoSeguimiento extends EditRecord
{
    protected static string $resource = EstadoSeguimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
