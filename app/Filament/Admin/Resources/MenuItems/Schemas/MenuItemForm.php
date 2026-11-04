<?php

namespace App\Filament\Admin\Resources\MenuItems\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class MenuItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('titulo')
                    ->label('Título do Link')
                    ->required()
                    ->maxLength(255),
                    
                TextInput::make('url')
                    ->label('Link / URL / Rota')
                    ->required()
                    ->default('/manutencao'),
                    
                Select::make('grupo')
                    ->label('Secção do Menu / Dropdown')
                    ->options([
                        'institucional' => '1. Institucional (Reitoria, etc)',
                        'ensino' => '2. A UniRovuma - Ensino ',
                        'faculdades' => '2. A UniRovuma - Faculdades',
                        'centros' => '2. A UniRovuma - Centros de Estudo',
                        'direccoes' => '2. A UniRovuma - Direcções Centrais',
                        'institutos' => '3. Institutos',
                        'unidades' => '4. Unidades Especiais',
                        'pesquisa' => '5. Pesquisa',
                        'servicos' => '6. Serviços Online',
                    ])
                    ->required(),
                    
                TextInput::make('coluna')
                    ->label('Coluna do Mega Menu (1 a 4, opcional)')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(4),
                    
                TextInput::make('ordem')
                    ->label('Ordem de Exibição')
                    ->numeric()
                    ->default(0),
            ]);
    }
}