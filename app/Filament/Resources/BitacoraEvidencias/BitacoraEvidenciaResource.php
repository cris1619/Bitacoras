<?php

namespace App\Filament\Resources\BitacoraEvidencias;

use App\Filament\Resources\BitacoraEvidencias\Pages\CreateBitacoraEvidencia;
use App\Filament\Resources\BitacoraEvidencias\Pages\EditBitacoraEvidencia;
use App\Filament\Resources\BitacoraEvidencias\Pages\ListBitacoraEvidencias;
use App\Filament\Resources\BitacoraEvidencias\Schemas\BitacoraEvidenciaForm;
use App\Filament\Resources\BitacoraEvidencias\Tables\BitacoraEvidenciasTable;
use App\Models\BitacoraEvidencia;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BitacoraEvidenciaResource extends Resource
{
    protected static ?string $model = BitacoraEvidencia::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'numero_bitacora';

    protected static ?string $navigationLabel = 'Bitácoras';

    protected static string | \UnitEnum | null $navigationGroup = 'Gestión Seguimiento';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return BitacoraEvidenciaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BitacoraEvidenciasTable::configure($table);
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
            'index' => ListBitacoraEvidencias::route('/'),
            'create' => CreateBitacoraEvidencia::route('/create'),
            'edit' => EditBitacoraEvidencia::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
