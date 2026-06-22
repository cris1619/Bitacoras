<?php

namespace App\Filament\Resources\BitacoraEvidencias\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BitacoraEvidenciasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('numero_bitacora')
                    ->label('Bitácora')
                    ->sortable(),

                TextColumn::make('aprendiz.nombres')
                    ->label('Aprendiz')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('aprendiz.apellidos')
                    ->label('Apellidos')
                    ->searchable(),

                TextColumn::make('seguimiento.numero_seguimiento')
                    ->label('Seguimiento'),

                TextColumn::make('estado.nombre_estado')
                    ->label('Estado')
                    ->badge(),

                TextColumn::make('fecha_limite_entrega')
                    ->label('Fecha Límite')
                    ->date('d/m/Y'),

                TextColumn::make('fecha_entrega')
                    ->label('Fecha Entrega')
                    ->date('d/m/Y'),

                TextColumn::make('created_at')
                    ->label('Creado')
                    ->dateTime('d/m/Y H:i'),

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