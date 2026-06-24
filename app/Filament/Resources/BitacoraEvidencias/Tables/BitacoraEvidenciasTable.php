<?php

namespace App\Filament\Resources\BitacoraEvidencias\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\DatePicker;

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

                    ->badge()

                    ->color(function ($record) {

                        if (
                            !$record->fecha_entrega &&
                            now()->greaterThan($record->fecha_limite_entrega)
                        ) {
                            return 'danger';
                        }

                        return 'warning';
                    }),

                TextColumn::make('fecha_limite_entrega')
                    ->label('Fecha Límite')
                    ->date('d/m/Y')

                    ->color(function ($record) {

                        if (
                            !$record->fecha_entrega &&
                            now()->greaterThan($record->fecha_limite_entrega)
                        ) {
                            return 'danger';
                        }

                        return 'success';
                    })

                    ->badge(),

                TextColumn::make('fecha_entrega')
                    ->badge()
                    ->color(fn ($state) => $state ? 'success' : 'gray')
                    ->label('Fecha Entrega')
                    ->date('d/m/Y'),

                TextColumn::make('created_at')
                    ->label('Creado')
                    ->dateTime('d/m/Y H:i'),

            ])
            ->filters([

    Filter::make('vencidas')

        ->query(function ($query) {

            return $query

                ->whereNull('fecha_entrega')

                ->whereDate(
                    'fecha_limite_entrega',
                    '<',
                    now()
                );
        }),

        Filter::make('pendientes')

            ->query(function ($query) {

                return $query

                    ->whereNull('fecha_entrega');
            }),

        Filter::make('entregadas')

            ->query(function ($query) {

                return $query

                    ->whereNotNull('fecha_entrega');
            }),

        Filter::make('fecha_limite')

            ->form([

                DatePicker::make('desde'),

                DatePicker::make('hasta'),

            ])

            ->query(function ($query, array $data) {

                return $query

                    ->when(
                        $data['desde'],
                        fn ($query) =>
                        $query->whereDate(
                            'fecha_limite_entrega',
                            '>=',
                            $data['desde']
                        )
                    )

                    ->when(
                        $data['hasta'],
                        fn ($query) =>
                        $query->whereDate(
                            'fecha_limite_entrega',
                            '<=',
                            $data['hasta']
                        )
                    );
            }),

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