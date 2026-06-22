<?php

namespace App\Filament\Resources\ProgramaFormacions\Pages;

use App\Filament\Resources\ProgramaFormacions\ProgramaFormacionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProgramaFormacions extends ListRecords
{
    protected static string $resource = ProgramaFormacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
