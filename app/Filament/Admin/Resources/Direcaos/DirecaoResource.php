<?php

namespace App\Filament\Admin\Resources\Direcaos;

use App\Filament\Admin\Resources\Direcaos\Pages\CreateDirecao;
use App\Filament\Admin\Resources\Direcaos\Pages\EditDirecao;
use App\Filament\Admin\Resources\Direcaos\Pages\ListDirecaos;
use App\Filament\Admin\Resources\Direcaos\Schemas\DirecaoForm;
use App\Filament\Admin\Resources\Direcaos\Tables\DirecaosTable;
use App\Models\Direcao;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DirecaoResource extends Resource
{
    protected static ?string $model = Direcao::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;

    protected static ?string $navigationLabel = 'Reitoria e Direção';
    protected static ?string $modelLabel = 'Membro da Direção';
    protected static ?string $pluralModelLabel = 'Membros da Direção';
    protected static string|UnitEnum|null $navigationGroup = 'Gestão do Site';

    protected static ?string $recordTitleAttribute = 'nome_completo';

    public static function form(Schema $schema): Schema
    {
        return DirecaoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DirecaosTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDirecaos::route('/'),
            'create' => CreateDirecao::route('/create'),
            'edit' => EditDirecao::route('/{record}/edit'),
        ];
    }
}