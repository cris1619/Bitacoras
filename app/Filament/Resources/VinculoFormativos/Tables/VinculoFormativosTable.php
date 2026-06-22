<?php

namespace App\Filament\Resources\VinculoFormativos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VinculoFormativosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                TextColumn::make('nombre_vinculo')
                    ->label('Vínculo Formativo')
                    ->searchable()
                    ->sortable(),

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