<?php

namespace App\Filament\Admin\Resources\UnidadeAcademicas;

use App\Filament\Admin\Resources\UnidadeAcademicas\Pages\CreateUnidadeAcademica;
use App\Filament\Admin\Resources\UnidadeAcademicas\Pages\EditUnidadeAcademica;
use App\Filament\Admin\Resources\UnidadeAcademicas\Pages\ListUnidadeAcademicas;
use App\Filament\Admin\Resources\UnidadeAcademicas\Schemas\UnidadeAcademicaForm;
use App\Filament\Admin\Resources\UnidadeAcademicas\Tables\UnidadeAcademicasTable;
use App\Models\UnidadeAcademica;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UnidadeAcademicaResource extends Resource
{
    protected static ?string $model = UnidadeAcademica::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingLibrary;

    // Rótulos e traduções em Português de Portugal (pt-PT)
    protected static ?string $navigationLabel = 'Unidades Orgânicas';
    protected static ?string $modelLabel = 'Unidade Académica';
    protected static ?string $pluralModelLabel = 'Unidades Académicas';
    protected static string|UnitEnum|null $navigationGroup = 'Gestão do Site';

    protected static ?string $recordTitleAttribute = 'nome';

    public static function form(Schema $schema): Schema
    {
        return UnidadeAcademicaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UnidadeAcademicasTable::configure($table);
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
            'index' => ListUnidadeAcademicas::route('/'),
            'create' => CreateUnidadeAcademica::route('/create'),
            'edit' => EditUnidadeAcademica::route('/{record}/edit'),
        ];
    }
}