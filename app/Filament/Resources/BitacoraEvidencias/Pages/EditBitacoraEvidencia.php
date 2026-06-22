<?php

namespace App\Filament\Resources\BitacoraEvidencias\Pages;

use App\Filament\Resources\BitacoraEvidencias\BitacoraEvidenciaResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditBitacoraEvidencia extends EditRecord
{
    protected static string $resource = BitacoraEvidenciaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
