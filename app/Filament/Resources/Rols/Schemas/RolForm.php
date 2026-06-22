<?php

namespace App\Filament\Resources\Rols\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RolForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre_rol')
                    ->label('Nombre del Rol')
                    ->required()
                    ->maxLength(50)
                    ->unique(ignoreRecord: true),
            ]);
    }
}