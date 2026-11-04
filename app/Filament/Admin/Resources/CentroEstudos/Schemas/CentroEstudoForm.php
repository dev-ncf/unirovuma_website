<?php

namespace App\Filament\Admin\Resources\CentroEstudos\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Forms\Set;
use Filament\Schemas\Components\Utilities\Set as UtilitiesSet;
use Illuminate\Support\Str;

class CentroEstudoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informações do Centro')
                    ->description('Detalhes institucionais, localização e contactos do centro de estudo.')
                    ->schema([
                        TextInput::make('nome')
                            ->label('Nome do Centro de Estudo')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (UtilitiesSet $set, ?string $state) => $set('slug', Str::slug($state))),
                        
                        TextInput::make('slug')
                            ->label('URL Slug (Ex: centro-de-estudos-em-governacao)')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        TextInput::make('coordenador')
                            ->label('Coordenador / Diretor do Centro')
                            ->maxLength(255),

                        FileUpload::make('coordenador_foto')
                            ->label('Fotografia do Coordenador')
                            ->image()
                            ->disk('public')
                            ->directory('centros-coordenadores'),

                        TextInput::make('email')
                            ->label('Email Institucional')
                            ->email()
                            ->maxLength(255),

                        TextInput::make('telefone')
                            ->label('Contacto Telefónico')
                            ->tel()
                            ->maxLength(50),

                        TextInput::make('localizacao')
                            ->label('Localização / Instalações')
                            ->placeholder('Ex: Campus Universitário Principal, Edifício de Investigação')
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ])->columns(2),

                Section::make('Apresentação e Investigação')
                    ->schema([
                        RichEditor::make('sobre')
                            ->label('Sobre o Centro (Missão, Visão e Atividades)')
                            ->required()
                            ->columnSpanFull(),

                        TagsInput::make('areas_pesquisa')
                            ->label('Áreas ou Linhas de Investigação')
                            ->placeholder('Escreva e prima Enter (Ex: Governança, Direitos Humanos)')
                            ->columnSpanFull(),

                        FileUpload::make('documentos')
                            ->label('Documentos, Publicações ou Brochuras (PDF)')
                            ->multiple()
                            ->downloadable()
                            ->disk('public')
                            ->directory('centros-documentos')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}