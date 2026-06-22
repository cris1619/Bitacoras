<?php

namespace App\Filament\Resources\Seguimientos\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SeguimientoForm
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

                        Select::make('instructor_id')
                            ->label('Instructor')
                            ->relationship('instructor', 'nombre_completo')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('estado_id')
                            ->label('Estado Seguimiento')
                            ->relationship('estado', 'nombre_estado')
                            ->searchable()
                            ->preload()
                            ->required(),

                        TextInput::make('numero_seguimiento')
                            ->label('Número Seguimiento')
                            ->numeric()
                            ->required(),

                    ])
                    ->columns(2),

                Section::make('Fechas')
                    ->schema([

                        DatePicker::make('fecha_programada')
                            ->label('Fecha Programada')
                            ->required(),

                        DatePicker::make('fecha_realizada')
                            ->label('Fecha Realizada'),

                    ])
                    ->columns(2),

                Section::make('Observaciones')
                    ->schema([

                        Textarea::make('observaciones')
                            ->label('Observaciones')
                            ->rows(4),

                        Textarea::make('compromisos')
                            ->label('Compromisos')
                            ->rows(4),

                        Textarea::make('recomendaciones')
                            ->label('Recomendaciones')
                            ->rows(4),

                    ])
                    ->columns(1),

                Section::make('Archivo Adjunto')
                    ->schema([

                        FileUpload::make('archivo_adjunto')
                        ->label('Archivo Evidencia')
                        ->disk('public')
                        ->directory('seguimientos')
                        ->preserveFilenames()
                        ->rules([
                            'mimes:pdf,xls,xlsx,doc,docx,png,jpg,jpeg'
                        ])
                        ->downloadable()
                        ->openable(),

                    ]),

            ]);
    }
}