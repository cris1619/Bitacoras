<?php

namespace App\Filament\Resources\Aprendizs;

use App\Filament\Resources\Aprendizs\Pages\CreateAprendiz;
use App\Filament\Resources\Aprendizs\Pages\EditAprendiz;
use App\Filament\Resources\Aprendizs\Pages\ListAprendizs;
use App\Filament\Resources\Aprendizs\Schemas\AprendizForm;
use App\Filament\Resources\Aprendizs\Tables\AprendizsTable;
use App\Models\Aprendiz;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AprendizResource extends Resource
{
    protected static ?string $model = Aprendiz::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nombres';

    public static function form(Schema $schema): Schema
    {
        return AprendizForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AprendizsTable::configure($table);
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
            'index' => ListAprendizs::route('/'),
            'create' => CreateAprendiz::route('/create'),
            'edit' => EditAprendiz::route('/{record}/edit'),
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
