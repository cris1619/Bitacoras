<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                TextColumn::make('nombre_completo')
                    ->label('Nombre Completo')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Correo Electrónico')
                    ->searchable(),

                TextColumn::make('roles.nombre_rol')
                    ->label('Roles')
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