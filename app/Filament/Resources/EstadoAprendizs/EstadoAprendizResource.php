<?php

namespace App\Filament\Resources\EstadoAprendizs;

use App\Filament\Resources\EstadoAprendizs\Pages\CreateEstadoAprendiz;
use App\Filament\Resources\EstadoAprendizs\Pages\EditEstadoAprendiz;
use App\Filament\Resources\EstadoAprendizs\Pages\ListEstadoAprendizs;
use App\Filament\Resources\EstadoAprendizs\Schemas\EstadoAprendizForm;
use App\Filament\Resources\EstadoAprendizs\Tables\EstadoAprendizsTable;
use App\Models\EstadoAprendiz;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EstadoAprendizResource extends Resource
{
    protected static ?string $model = EstadoAprendiz::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nombre_estado';

    public static function form(Schema $schema): Schema
    {
        return EstadoAprendizForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EstadoAprendizsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEstadoAprendizs::route('/'),
            'create' => CreateEstadoAprendiz::route('/create'),
            'edit' => EditEstadoAprendiz::route('/{record}/edit'),
        ];
    }
}
