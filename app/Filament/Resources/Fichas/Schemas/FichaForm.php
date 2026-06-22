<?php

namespace App\Filament\Resources\Fichas\Schemas;

use App\Models\ProgramaFormacion;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FichaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('numero_ficha')
                    ->label('Número de Ficha')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->numeric(),

                Select::make('programa_id')
                    ->label('Programa de Formación')
                    ->relationship('programa', 'nombre_programa')
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }
}