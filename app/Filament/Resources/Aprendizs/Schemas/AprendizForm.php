<?php

namespace App\Filament\Resources\Aprendizs\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AprendizForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Información Personal')
                    ->schema([

                        Select::make('tipo_documento')
                            ->label('Tipo Documento')
                            ->options([
                                'CC' => 'Cédula',
                                'TI' => 'Tarjeta de Identidad',
                                'CE' => 'Cédula Extranjería',
                                'PPT' => 'PPT',
                            ])
                            ->required(),

                        TextInput::make('documento_identidad')
                            ->label('Documento')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(20),

                        TextInput::make('nombres')
                            ->label('Nombres')
                            ->required()
                            ->maxLength(100),

                        TextInput::make('apellidos')
                            ->label('Apellidos')
                            ->required()
                            ->maxLength(100),

                        TextInput::make('correo_electronico')
                            ->label('Correo Electrónico')
                            ->email()
                            ->required(),

                        TextInput::make('telefono')
                            ->label('Teléfono')
                            ->tel()
                            ->required(),

                    ])
                    ->columns(2),

                Section::make('Información Académica')
                    ->schema([

                        Select::make('ficha_id')
                            ->label('Ficha')
                            ->relationship('ficha', 'numero_ficha')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('estado_id')
                            ->label('Estado Aprendiz')
                            ->relationship('estado', 'nombre_estado')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('vinculo_id')
                            ->label('Vínculo Formativo')
                            ->relationship('vinculo', 'nombre_vinculo')
                            ->searchable()
                            ->preload()
                            ->required(),

                    ])
                    ->columns(3),

                Section::make('Información Empresarial')
                    ->schema([

                        TextInput::make('empresa')
                            ->label('Empresa'),

                        TextInput::make('jefe_inmediato')
                            ->label('Jefe Inmediato'),

                        TextInput::make('correo_empresa')
                            ->label('Correo Empresa')
                            ->email(),

                        TextInput::make('telefono_empresa')
                            ->label('Teléfono Empresa')
                            ->tel(),

                    ])
                    ->columns(2),

                Section::make('Etapa Práctica')
                    ->schema([

                        DatePicker::make('fecha_inicio_practica')
                            ->label('Fecha Inicio Práctica'),

                        DatePicker::make('fecha_fin_practica')
                            ->label('Fecha Fin Práctica'),

                    ])
                    ->columns(2),

                Section::make('Observaciones')
                    ->schema([

                        Textarea::make('detalles_contrato')
                            ->label('Detalles del Contrato')
                            ->rows(5),

                    ]),

            ]);
    }
}