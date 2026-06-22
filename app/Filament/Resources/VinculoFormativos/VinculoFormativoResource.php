<?php

namespace App\Filament\Resources\VinculoFormativos;

use App\Filament\Resources\VinculoFormativos\Pages\CreateVinculoFormativo;
use App\Filament\Resources\VinculoFormativos\Pages\EditVinculoFormativo;
use App\Filament\Resources\VinculoFormativos\Pages\ListVinculoFormativos;
use App\Filament\Resources\VinculoFormativos\Schemas\VinculoFormativoForm;
use App\Filament\Resources\VinculoFormativos\Tables\VinculoFormativosTable;
use App\Models\VinculoFormativo;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VinculoFormativoResource extends Resource
{
    protected static ?string $model = VinculoFormativo::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nombre_vinculo';

    public static function form(Schema $schema): Schema
    {
        return VinculoFormativoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VinculoFormativosTable::configure($table);
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
            'index' => ListVinculoFormativos::route('/'),
            'create' => CreateVinculoFormativo::route('/create'),
            'edit' => EditVinculoFormativo::route('/{record}/edit'),
        ];
    }
}
