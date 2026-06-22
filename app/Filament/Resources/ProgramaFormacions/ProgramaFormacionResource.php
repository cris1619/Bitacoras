<?php

namespace App\Filament\Resources\ProgramaFormacions;

use App\Filament\Resources\ProgramaFormacions\Pages\CreateProgramaFormacion;
use App\Filament\Resources\ProgramaFormacions\Pages\EditProgramaFormacion;
use App\Filament\Resources\ProgramaFormacions\Pages\ListProgramaFormacions;
use App\Filament\Resources\ProgramaFormacions\Schemas\ProgramaFormacionForm;
use App\Filament\Resources\ProgramaFormacions\Tables\ProgramaFormacionsTable;
use App\Models\ProgramaFormacion;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProgramaFormacionResource extends Resource
{
    protected static ?string $model = ProgramaFormacion::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nombre_programa';

    public static function form(Schema $schema): Schema
    {
        return ProgramaFormacionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProgramaFormacionsTable::configure($table);
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
            'index' => ListProgramaFormacions::route('/'),
            'create' => CreateProgramaFormacion::route('/create'),
            'edit' => EditProgramaFormacion::route('/{record}/edit'),
        ];
    }
}
