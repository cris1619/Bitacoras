<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Models\Rol;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('nombre_completo')
                    ->label('Nombre Completo')
                    ->required()
                    ->maxLength(150),

                TextInput::make('email')
                    ->label('Correo Electrónico')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('password')
                    ->label('Contraseña')
                    ->password()
                    ->required(fn ($operation) => $operation === 'create')
                    ->dehydrateStateUsing(fn ($state) => bcrypt($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->maxLength(255),

                Select::make('roles')
                    ->label('Roles')
                    ->multiple()
                    ->relationship('roles', 'nombre_rol')
                    ->preload()
                    ->searchable(),
            ]);
    }
}