<?php

namespace App\Filament\Resources\Aprendizs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AprendizsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('documento_identidad')
                    ->label('Documento')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('nombres')
                    ->label('Nombres')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('apellidos')
                    ->label('Apellidos')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('ficha.numero_ficha')
                    ->label('Ficha')
                    ->sortable(),

                TextColumn::make('ficha.programa.nombre_programa')
                    ->label('Programa')
                    ->searchable(),

                TextColumn::make('estado.nombre_estado')
                    ->label('Estado')
                    ->badge(),

                TextColumn::make('vinculo.nombre_vinculo')
                    ->label('Vínculo')
                    ->badge(),

                TextColumn::make('empresa')
                    ->label('Empresa')
                    ->searchable(),

                TextColumn::make('fecha_inicio_practica')
                    ->label('Inicio Práctica')
                    ->date('d/m/Y'),

                TextColumn::make('fecha_fin_practica')
                    ->label('Fin Práctica')
                    ->date('d/m/Y'),

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