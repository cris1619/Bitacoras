<?php

namespace App\Filament\Resources\EstadoSeguimientos;

use App\Filament\Resources\EstadoSeguimientos\Pages\CreateEstadoSeguimiento;
use App\Filament\Resources\EstadoSeguimientos\Pages\EditEstadoSeguimiento;
use App\Filament\Resources\EstadoSeguimientos\Pages\ListEstadoSeguimientos;
use App\Filament\Resources\EstadoSeguimientos\Schemas\EstadoSeguimientoForm;
use App\Filament\Resources\EstadoSeguimientos\Tables\EstadoSeguimientosTable;
use App\Models\EstadoSeguimiento;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EstadoSeguimientoResource extends Resource
{
    protected static ?string $model = EstadoSeguimiento::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nombre_estado';

    public static function form(Schema $schema): Schema
    {
        return EstadoSeguimientoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EstadoSeguimientosTable::configure($table);
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
            'index' => ListEstadoSeguimientos::route('/'),
            'create' => CreateEstadoSeguimiento::route('/create'),
            'edit' => EditEstadoSeguimiento::route('/{record}/edit'),
        ];
    }
}
