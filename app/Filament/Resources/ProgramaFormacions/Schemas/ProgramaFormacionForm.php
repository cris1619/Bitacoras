<?php

namespace App\Filament\Resources\ProgramaFormacions\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProgramaFormacionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('codigo_programa')
                    ->label('Código del Programa')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(20),

                TextInput::make('nombre_programa')
                    ->label('Nombre del Programa')
                    ->required()
                    ->maxLength(150),

                Select::make('nivel_formacion')
                    ->label('Nivel de Formación')
                    ->required()
                    ->options([
                        'Tecnico' => 'Técnico',
                        'Tecnologo' => 'Tecnólogo',
                        'Especializacion' => 'Especialización',
                    ]),
            ]);
    }
}