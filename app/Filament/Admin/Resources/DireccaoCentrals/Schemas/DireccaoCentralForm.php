<?php

namespace App\Filament\Admin\Resources\DireccaoCentrals\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Set as UtilitiesSet;
use Illuminate\Support\Str;

class DireccaoCentralForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informações da Direcção')
                    ->description('Detalhes institucionais, diretor e contactos da direcção central.')
                    ->schema([
                        TextInput::make('nome')
                            ->label('Nome da Direcção')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (UtilitiesSet $set, ?string $state) => $set('slug', Str::slug($state))),
                        
                        TextInput::make('slug')
                            ->label('URL Slug (Ex: direccao-de-recursos-humanos)')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        TextInput::make('diretor')
                            ->label('Diretor / Responsável')
                            ->maxLength(255),

                        FileUpload::make('diretor_foto')
                            ->label('Fotografia do Diretor')
                            ->image()
                            ->disk('public')
                            ->directory('direccoes-diretores'),

                        TextInput::make('email')
                            ->label('Email Institucional')
                            ->email()
                            ->maxLength(255),

                        TextInput::make('telefone')
                            ->label('Contacto Telefónico')
                            ->tel()
                            ->maxLength(50),

                        TextInput::make('localizacao')
                            ->label('Localização / Edifício')
                            ->placeholder('Ex: Edifício da Reitoria, Piso 1')
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ])->columns(2),

                Section::make('Apresentação e Atribuições')
                    ->schema([
                        RichEditor::make('sobre')
                            ->label('Sobre a Direcção (Funções e Serviços Prestados)')
                            ->required()
                            ->columnSpanFull(),

                        FileUpload::make('documentos')
                            ->label('Minutas, Requerimentos ou Formulários Úteis (PDF)')
                            ->multiple()
                            ->downloadable()
                            ->disk('public')
                            ->directory('direccoes-documentos')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}