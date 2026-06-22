<?php

namespace App\Filament\Resources\VinculoFormativos\Pages;

use App\Filament\Resources\VinculoFormativos\VinculoFormativoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditVinculoFormativo extends EditRecord
{
    protected static string $resource = VinculoFormativoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
