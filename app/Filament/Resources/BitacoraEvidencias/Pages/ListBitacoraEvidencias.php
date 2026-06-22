<?php

namespace App\Filament\Resources\BitacoraEvidencias\Pages;

use App\Filament\Resources\BitacoraEvidencias\BitacoraEvidenciaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBitacoraEvidencias extends ListRecords
{
    protected static string $resource = BitacoraEvidenciaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
