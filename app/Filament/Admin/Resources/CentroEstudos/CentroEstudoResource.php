<?php

namespace App\Filament\Admin\Resources\CentroEstudos;

use App\Filament\Admin\Resources\CentroEstudos\Pages\CreateCentroEstudo;
use App\Filament\Admin\Resources\CentroEstudos\Pages\EditCentroEstudo;
use App\Filament\Admin\Resources\CentroEstudos\Pages\ListCentroEstudos;
use App\Filament\Admin\Resources\CentroEstudos\Schemas\CentroEstudoForm;
use App\Filament\Admin\Resources\CentroEstudos\Tables\CentroEstudosTable;
use App\Models\CentroEstudo;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CentroEstudoResource extends Resource
{
    protected static ?string $model = CentroEstudo::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedAcademicCap;

    protected static ?string $navigationLabel = 'Centros de Estudo';
    protected static ?string $modelLabel = 'Centro de Estudo';
    protected static ?string $pluralModelLabel = 'Centros de Estudo';
    protected static string|UnitEnum|null $navigationGroup = 'Gestão do Site';

    protected static ?string $recordTitleAttribute = 'nome';

    public static function form(Schema $schema): Schema
    {
        return CentroEstudoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CentroEstudosTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCentroEstudos::route('/'),
            'create' => CreateCentroEstudo::route('/create'),
            'edit' => EditCentroEstudo::route('/{record}/edit'),
        ];
    }
}