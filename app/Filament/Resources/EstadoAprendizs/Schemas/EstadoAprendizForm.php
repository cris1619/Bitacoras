<?php

namespace App\Filament\Resources\EstadoAprendizs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EstadoAprendizForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('nombre_estado')
                    ->label('Nombre del Estado')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(50),

            ]);
    }
}