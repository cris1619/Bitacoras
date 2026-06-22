<?php

namespace App\Filament\Resources\ProgramaFormacions\Pages;

use App\Filament\Resources\ProgramaFormacions\ProgramaFormacionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProgramaFormacion extends EditRecord
{
    protected static string $resource = ProgramaFormacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
