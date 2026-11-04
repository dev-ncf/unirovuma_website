<?php

namespace App\Filament\Admin\Resources\Gabinetes;

use App\Filament\Admin\Resources\Gabinetes\Pages\CreateGabinete;
use App\Filament\Admin\Resources\Gabinetes\Pages\EditGabinete;
use App\Filament\Admin\Resources\Gabinetes\Pages\ListGabinetes;
use App\Filament\Admin\Resources\Gabinetes\Schemas\GabineteForm;
use App\Filament\Admin\Resources\Gabinetes\Tables\GabinetesTable;
use App\Models\Gabinete;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GabineteResource extends Resource
{
    protected static ?string $model = Gabinete::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBriefcase;

    protected static ?string $navigationLabel = 'Gabinetes';
    protected static ?string $modelLabel = 'Gabinete';
    protected static ?string $pluralModelLabel = 'Gabinetes de Apoio';
    protected static string|UnitEnum|null $navigationGroup = 'Gestão do Site';

    protected static ?string $recordTitleAttribute = 'nome';

    public static function form(Schema $schema): Schema
    {
        return GabineteForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GabinetesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListGabinetes::route('/'),
            'create' => CreateGabinete::route('/create'),
            'edit' => EditGabinete::route('/{record}/edit'),
        ];
    }
}