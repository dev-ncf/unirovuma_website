<?php

namespace App\Filament\Admin\Resources\Direcaos\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Set as UtilitiesSet;
use Illuminate\Support\Str;

class DirecaoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informações do Dirigente')
                    ->description('Insira os dados do Reitor ou Vice-Reitores da Universidade Rovuma.')
                    ->schema([
                        TextInput::make('cargo')
                            ->label('Cargo (Ex: Reitor, Vice-Reitor Académico)')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (UtilitiesSet $set, ?string $state) => $set('slug', Str::slug($state))),
                        
                        TextInput::make('slug')
                            ->label('URL Slug (Ex: reitor, vice-reitor-academico)')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        TextInput::make('nome_completo')
                            ->label('Nome Completo com Títulos')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        FileUpload::make('foto')
                            ->label('Fotografia Oficial')
                            ->image()
                            ->disk('public')
                            ->directory('direcao-fotos')
                            ->columnSpanFull(),

                        TextInput::make('email')
                            ->label('Email Institucional')
                            ->email()
                            ->maxLength(255),

                        TextInput::make('telefone')
                            ->label('Contacto Telefónico')
                            ->tel()
                            ->maxLength(50),
                    ])->columns(2),

                Section::make('Discursos e Biografia')
                    ->schema([
                        RichEditor::make('mensagem')
                            ->label('Mensagem de Boas-Vindas / Institucional')
                            ->columnSpanFull(),

                        RichEditor::make('biografia')
                            ->label('Nota Biográfica / Curriculum')
                            ->required()
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}