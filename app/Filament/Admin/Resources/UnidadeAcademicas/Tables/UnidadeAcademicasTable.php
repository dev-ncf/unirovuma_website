<?php

namespace App\Filament\Admin\Resources\UnidadeAcademicas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class UnidadeAcademicasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nome')
                    ->label('Nome da Unidade')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('tipo')
                    ->label('Categoria')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'faculdade' => 'success',
                        'instituto' => 'info',
                        'centro' => 'warning',
                        'direccao' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->sortable(),

                TextColumn::make('diretor')
                    ->label('Diretor / Responsável')
                    ->searchable()
                    ->placeholder('Não definido'),

                TextColumn::make('cursos_count')
                    ->counts('cursos')
                    ->label('Cursos')
                    ->badge()
                    ->alignCenter(),

                TextColumn::make('updated_at')
                    ->label('Última Atualização')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('tipo')
                    ->label('Filtrar por Categoria')
                    ->options([
                        'faculdade' => 'Faculdade',
                        'instituto' => 'Instituto',
                        'centro' => 'Centro de Estudo',
                        'direccao' => 'Direcção Central',
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
            ->defaultSort('nome', 'asc');
    }
}