<?php

namespace App\Filament\Admin\Resources\Candidaturas\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CandidaturaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Dados Pessoais do Candidato')
                    ->columns(2)
                    ->schema([
                        TextInput::make('nome')
                            ->label('Nome Completo')
                            ->required(),

                        TextInput::make('bi_numero')
                            ->label('Número de BI')
                            ->required(),

                        TextInput::make('email')
                            ->label('E-mail')
                            ->email()
                            ->required(),

                        TextInput::make('telefone')
                            ->label('Telefone')
                            ->tel()
                            ->required(),

                        TextInput::make('curso')
                            ->label('Curso Escolhido')
                            ->columnSpanFull()
                            ->required(),
                    ]),

                Section::make('Documentos Submetidos')
                    ->description('Documentos anexados pelo candidato. Pode pré-visualizar ou descarregar.')
                    ->columns(2)
                    ->schema([
                        FileUpload::make('copia_bi')
                            ->label('Cópia do BI')
                            ->disk('public')
                            ->directory('documentos')
                            ->openable()
                            ->downloadable(),

                        FileUpload::make('comp_inscricao')
                            ->label('Comprovativo de Inscrição')
                            ->disk('public')
                            ->directory('documentos')
                            ->openable()
                            ->downloadable(),

                        FileUpload::make('comp_pagamento')
                            ->label('Comprovativo de Pagamento')
                            ->disk('public')
                            ->directory('documentos')
                            ->openable()
                            ->downloadable(),

                        FileUpload::make('requerimento')
                            ->label('Requerimento')
                            ->disk('public')
                            ->directory('documentos')
                            ->openable()
                            ->downloadable(),
                    ]),
            ]);
    }
}