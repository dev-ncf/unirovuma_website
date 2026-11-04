<?php

namespace App\Filament\Admin\Resources\DireccaoCentrals\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DireccaoCentralsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nome')
                    ->label('Nome da Direcção')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('diretor')
                    ->label('Diretor')
                    ->searchable(),

                TextColumn::make('email')
                    ->label('Email'),

                TextColumn::make('updated_at')
                    ->label('Atualizado em')
                    ->dateTime('d/m/Y H:i'),
            ])
            ->recordActions([
                EditAction::make()->label('Editar'),
                DeleteAction::make()->label('Eliminar'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()->label('Eliminar Selecionados'),
                ]),
            ])
            ->defaultSort('nome', 'asc');
    }
}