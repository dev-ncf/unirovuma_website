<?php

namespace App\Filament\Admin\Resources\DireccaoCentrals;

use App\Filament\Admin\Resources\DireccaoCentrals\Pages\CreateDireccaoCentral;
use App\Filament\Admin\Resources\DireccaoCentrals\Pages\EditDireccaoCentral;
use App\Filament\Admin\Resources\DireccaoCentrals\Pages\ListDireccaoCentrals;
use App\Filament\Admin\Resources\DireccaoCentrals\Schemas\DireccaoCentralForm;
use App\Filament\Admin\Resources\DireccaoCentrals\Tables\DireccaoCentralsTable;
use App\Models\DireccaoCentral;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DireccaoCentralResource extends Resource
{
    protected static ?string $model = DireccaoCentral::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;

    protected static ?string $navigationLabel = 'Direcções Centrais';
    protected static ?string $modelLabel = 'Direcção Central';
    protected static ?string $pluralModelLabel = 'Direcções Centrais';
    protected static string|UnitEnum|null $navigationGroup = 'Gestão do Site';

    protected static ?string $recordTitleAttribute = 'nome';

    public static function form(Schema $schema): Schema
    {
        return DireccaoCentralForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DireccaoCentralsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDireccaoCentrals::route('/'),
            'create' => CreateDireccaoCentral::route('/create'),
            'edit' => EditDireccaoCentral::route('/{record}/edit'),
        ];
    }
}