<?php

namespace App\Filament\Resources\ProgramaFormacions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProgramaFormacionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                TextColumn::make('codigo_programa')
                    ->label('Código')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('nombre_programa')
                    ->label('Programa')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('nivel_formacion')
                    ->label('Nivel')
                    ->badge(),

                TextColumn::make('created_at')
                    ->label('Fecha Creación')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}