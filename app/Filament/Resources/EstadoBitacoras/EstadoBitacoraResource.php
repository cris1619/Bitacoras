<?php

namespace App\Filament\Resources\EstadoBitacoras;

use App\Filament\Resources\EstadoBitacoras\Pages\CreateEstadoBitacora;
use App\Filament\Resources\EstadoBitacoras\Pages\EditEstadoBitacora;
use App\Filament\Resources\EstadoBitacoras\Pages\ListEstadoBitacoras;
use App\Filament\Resources\EstadoBitacoras\Schemas\EstadoBitacoraForm;
use App\Filament\Resources\EstadoBitacoras\Tables\EstadoBitacorasTable;
use App\Models\EstadoBitacora;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EstadoBitacoraResource extends Resource
{
    protected static ?string $model = EstadoBitacora::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nombre_estado';

    public static function form(Schema $schema): Schema
    {
        return EstadoBitacoraForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EstadoBitacorasTable::configure($table);
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
            'index' => ListEstadoBitacoras::route('/'),
            'create' => CreateEstadoBitacora::route('/create'),
            'edit' => EditEstadoBitacora::route('/{record}/edit'),
        ];
    }
}
