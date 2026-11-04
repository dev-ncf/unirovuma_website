<?php

namespace App\Filament\Admin\Resources\MenuItems\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class MenuItemsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('titulo')
                    ->label('Título do Link')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('grupo')
                    ->label('Grupo')
                    ->badge()
                    ->sortable(),

                TextColumn::make('url')
                    ->label('Link / URL')
                    ->limit(30)
                    ->searchable(),

                TextColumn::make('coluna')
                    ->label('Coluna')
                    ->sortable()
                    ->alignCenter(),

                TextColumn::make('ordem')
                    ->label('Ordem')
                    ->sortable()
                    ->alignCenter(),

                TextColumn::make('updated_at')
                    ->label('Última Atualização')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('grupo')
                    ->label('Filtrar por Secção')
                    ->options([
                        'institucional' => 'Institucional',
                        'ensino' => 'Ensino',
                        'faculdades' => 'Faculdades',
                        'centros' => 'Centros de Estudo',
                        'direccoes' => 'Direcções Centrais',
                        'institutos' => 'Institutos',
                        'unidades' => 'Unidades Especiais',
                        'pesquisa' => 'Pesquisa',
                        'servicos' => 'Serviços Online',
                    ]),
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
            ->defaultSort('ordem', 'asc');
    }
}