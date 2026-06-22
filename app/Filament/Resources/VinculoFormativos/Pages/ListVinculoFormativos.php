<?php

namespace App\Filament\Resources\VinculoFormativos\Pages;

use App\Filament\Resources\VinculoFormativos\VinculoFormativoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVinculoFormativos extends ListRecords
{
    protected static string $resource = VinculoFormativoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
