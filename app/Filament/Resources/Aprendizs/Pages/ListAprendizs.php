<?php

namespace App\Filament\Resources\Aprendizs\Pages;

use App\Filament\Resources\Aprendizs\AprendizResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAprendizs extends ListRecords
{
    protected static string $resource = AprendizResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
