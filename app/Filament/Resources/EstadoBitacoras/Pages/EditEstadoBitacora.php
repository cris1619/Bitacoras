<?php

namespace App\Filament\Resources\EstadoBitacoras\Pages;

use App\Filament\Resources\EstadoBitacoras\EstadoBitacoraResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEstadoBitacora extends EditRecord
{
    protected static string $resource = EstadoBitacoraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
