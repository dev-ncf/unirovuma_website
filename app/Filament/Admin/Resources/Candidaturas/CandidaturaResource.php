<?php

namespace App\Filament\Admin\Resources\Candidaturas;

use App\Filament\Admin\Resources\Candidaturas\Pages\CreateCandidatura;
use App\Filament\Admin\Resources\Candidaturas\Pages\EditCandidatura;
use App\Filament\Admin\Resources\Candidaturas\Pages\ListCandidaturas;
use App\Filament\Admin\Resources\Candidaturas\Schemas\CandidaturaForm;
use App\Filament\Admin\Resources\Candidaturas\Tables\CandidaturasTable;
use App\Models\Candidatura;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CandidaturaResource extends Resource
{
    protected static ?string $model = Candidatura::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'admin';

    public static function form(Schema $schema): Schema
    {
        return CandidaturaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CandidaturasTable::configure($table);
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
            'index' => ListCandidaturas::route('/'),
            'create' => CreateCandidatura::route('/create'),
            'edit' => EditCandidatura::route('/{record}/edit'),
        ];
    }
}
