<?php

namespace App\Filament\Resources\Seguimientos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SeguimientosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('numero_seguimiento')
                    ->label('Seguimiento')
                    ->sortable(),

                TextColumn::make('aprendiz.nombres')
                    ->label('Aprendiz')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('aprendiz.apellidos')
                    ->label('Apellidos')
                    ->searchable(),

                TextColumn::make('instructor.nombre_completo')
                    ->label('Instructor')
                    ->searchable(),

                TextColumn::make('estado.nombre_estado')
                    ->label('Estado')
                    ->badge(),

                TextColumn::make('fecha_programada')
                    ->label('Fecha Programada')
                    ->date('d/m/Y'),

                TextColumn::make('fecha_realizada')
                    ->label('Fecha Realizada')
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