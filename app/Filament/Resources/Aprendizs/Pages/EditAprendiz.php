<?php

namespace App\Filament\Resources\Aprendizs\Pages;

use App\Filament\Resources\Aprendizs\AprendizResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditAprendiz extends EditRecord
{
    protected static string $resource = AprendizResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
