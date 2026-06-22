<?php

namespace App\Filament\Resources\EstadoSeguimientos\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EstadoSeguimientoForm
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