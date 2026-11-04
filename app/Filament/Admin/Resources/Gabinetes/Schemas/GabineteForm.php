<?php

namespace App\Filament\Admin\Resources\Gabinetes\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Forms\Set;
use Filament\Schemas\Components\Utilities\Set as UtilitiesSet;
use Illuminate\Support\Str;

class GabineteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informações do Gabinete')
                    ->description('Detalhes institucionais e contactos do gabinete.')
                    ->schema([
                        TextInput::make('nome')
                            ->label('Nome do Gabinete')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (UtilitiesSet $set, ?string $state) => $set('slug', Str::slug($state))),
                        
                        TextInput::make('slug')
                            ->label('URL Slug (Ex: gabinete-juridico)')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        TextInput::make('responsavel')
                            ->label('Chefe / Responsável do Gabinete')
                            ->maxLength(255),

                        FileUpload::make('responsavel_foto')
                            ->label('Fotografia do Responsável')
                            ->image()
                            ->disk('public')
                            ->directory('gabinetes-responsaveis'),

                        TextInput::make('email')
                            ->label('Email Institucional')
                            ->email()
                            ->maxLength(255),

                        TextInput::make('telefone')
                            ->label('Contacto Telefónico')
                            ->tel()
                            ->maxLength(50),

                        TextInput::make('localizacao')
                            ->label('Localização / Gabinete Físico')
                            ->placeholder('Ex: Campus Central, Bloco A, Sala 12')
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ])->columns(2),

                Section::make('Apresentação e Funções')
                    ->schema([
                        RichEditor::make('sobre')
                            ->label('Descrição / Competências do Gabinete')
                            ->required()
                            ->columnSpanFull(),

                        FileUpload::make('documentos')
                            ->label('Documentos / Regulamentos Úteis (PDF)')
                            ->multiple()
                            ->downloadable()
                            ->disk('public')
                            ->directory('gabinetes-documentos')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}