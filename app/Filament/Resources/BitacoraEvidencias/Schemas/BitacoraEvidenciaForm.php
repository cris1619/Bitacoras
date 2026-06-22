<?php

namespace App\Filament\Resources\BitacoraEvidencias\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BitacoraEvidenciaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Información General')
                    ->schema([

                        Select::make('aprendiz_id')
                            ->label('Aprendiz')
                            ->relationship('aprendiz', 'nombres')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('seguimiento_id')
                            ->label('Seguimiento')
                            ->relationship('seguimiento', 'numero_seguimiento')
                            ->searchable()
                            ->preload(),

                        Select::make('estado_id')
                            ->label('Estado Bitácora')
                            ->relationship('estado', 'nombre_estado')
                            ->searchable()
                            ->preload()
                            ->required(),

                        TextInput::make('numero_bitacora')
                            ->label('Número Bitácora')
                            ->numeric()
                            ->required(),

                    ])
                    ->columns(2),

                Section::make('Fechas')
                    ->schema([

                        DatePicker::make('fecha_limite_entrega')
                            ->label('Fecha Límite')
                            ->required(),

                        DatePicker::make('fecha_entrega')
                            ->label('Fecha Entrega'),

                    ])
                    ->columns(2),

                Section::make('Evidencia')
                    ->schema([

                        FileUpload::make('archivo_evidencia_url')
                            ->label('Archivo Evidencia')
                            ->disk('public')
                            ->directory('bitacoras')
                            ->preserveFilenames()

                            ->rules([
                                'mimes:pdf,xls,xlsx,doc,docx,png,jpg,jpeg'
                            ])

                            ->downloadable()
                            ->openable(),

                    ]),

                Section::make('Novedades')
                    ->schema([

                        Textarea::make('novedades')
                            ->label('Novedades')
                            ->rows(5),

                    ]),

            ]);
    }
}