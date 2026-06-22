<?php

namespace App\Filament\Resources\Fichas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FichasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                TextColumn::make('numero_ficha')
                    ->label('Número de Ficha')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('programa.nombre_programa')
                    ->label('Programa')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('programa.nivel_formacion')
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