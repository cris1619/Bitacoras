<?php

namespace App\Filament\Resources\VinculoFormativos\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class VinculoFormativoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('nombre_vinculo')
                    ->label('Nombre del Vínculo')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(100),

            ]);
    }
}