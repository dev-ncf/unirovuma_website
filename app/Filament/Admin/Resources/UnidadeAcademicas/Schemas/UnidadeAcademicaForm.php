<?php

namespace App\Filament\Admin\Resources\UnidadeAcademicas\Schemas;

use App\Models\MenuItem;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;

class UnidadeAcademicaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informações Gerais')
                    ->description('Insira os dados principais e de contacto da unidade ou faculdade.')
                    ->schema([
                        Select::make('nome')
                            ->label('Nome da Unidade / Faculdade (Do Menu)')
                            ->options(fn () => MenuItem::pluck('titulo', 'titulo')->toArray())
                            ->searchable()
                            ->preload()
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                        
                        TextInput::make('slug')
                            ->label('URL Slug (Ex: faculdade-de-ciencias)')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        Select::make('tipo')
                            ->label('Categoria da Unidade')
                            ->options([
                                'faculdade' => 'Faculdade',
                                'instituto' => 'Instituto',
                                'centro' => 'Centro de Estudo',
                                'direccao' => 'Direcção Central',
                            ])
                            ->required()
                            ->native(false),

                        TextInput::make('diretor')
                            ->label('Diretor / Responsável')
                            ->maxLength(255),

                        // Foto do Diretor (Armazenada explicitamente no disco public)
                        FileUpload::make('diretor_foto')
                            ->label('Fotografia do Diretor')
                            ->image()
                            ->disk('public')
                            ->directory('diretores-fotos')
                            ->columnSpanFull(),

                        TextInput::make('email')
                            ->label('Correio Eletrónico (Email)')
                            ->email()
                            ->maxLength(255),

                        TextInput::make('telefone')
                            ->label('Contacto Telefónico')
                            ->tel()
                            ->maxLength(50),
                    ])->columns(2),

                Section::make('Apresentação Institucional')
                    ->description('Histórico, missão, visão ou introdução exibida na página da unidade.')
                    ->schema([
                        RichEditor::make('sobre')
                            ->label('Conteúdo "Sobre a Unidade"')
                            ->columnSpanFull(),
                    ]),

                Section::make('Cursos Ministrados')
                    ->description('Adicione os cursos associados a esta faculdade ou unidade.')
                    ->schema([
                        Repeater::make('cursos')
                            ->relationship('cursos')
                            ->label('Cursos')
                            ->schema([
                                TextInput::make('nome')
                                    ->label('Nome do Curso')
                                    ->required()
                                    ->maxLength(255),
                                
                                TextInput::make('grau')
                                    ->label('Grau Académico')
                                    ->default('Licenciatura')
                                    ->required()
                                    ->maxLength(100),
                                
                                TextInput::make('regime')
                                    ->label('Regime')
                                    ->default('Laboral')
                                    ->required()
                                    ->maxLength(100),
                            ])
                            ->columns(3)
                            ->columnSpanFull()
                    ]),

                Section::make('Notícias e Destaques (Opcional)')
                    ->description('Notícias específicas publicadas por esta unidade com suporte a múltiplas imagens.')
                    ->schema([
                        Repeater::make('noticias')
                            ->relationship('noticias')
                            ->label('Notícias')
                            ->schema([
                                TextInput::make('titulo')
                                    ->label('Título da Notícia')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpanFull(),
                                
                                Textarea::make('resumo')
                                    ->label('Resumo ou Descrição Curta')
                                    ->required()
                                    ->rows(2)
                                    ->columnSpanFull(),
                                
                                // Múltiplas imagens com disco public definido
                                FileUpload::make('imagens')
                                    ->label('Imagens da Notícia')
                                    ->image()
                                    ->multiple()
                                    ->reorderable()
                                    ->disk('public')
                                    ->directory('noticias-imagens')
                                    ->columnSpanFull(),

                                DatePicker::make('data')
                                    ->label('Data da Notícia')
                                    ->required()
                                    ->default(now()),
                            ])
                            ->columnSpanFull()
                    ]),

                Section::make('Projectos e Atividades (Opcional)')
                    ->description('Projectos de investigação ou atividades em curso com suporte a anexos.')
                    ->schema([
                        Repeater::make('projetos')
                            ->relationship('projetos')
                            ->label('Projectos')
                            ->schema([
                                TextInput::make('titulo')
                                    ->label('Título do Projecto')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpanFull(),
                                
                                Textarea::make('descricao')
                                    ->label('Descrição do Projecto')
                                    ->required()
                                    ->rows(2)
                                    ->columnSpanFull(),
                                
                                // Anexos múltiplos com disco public definido
                                FileUpload::make('anexos')
                                    ->label('Documentos / Anexos do Projecto')
                                    ->multiple()
                                    ->downloadable()
                                    ->disk('public')
                                    ->directory('projetos-anexos')
                                    ->columnSpanFull(),
                            ])
                            ->columnSpanFull()
                    ]),
            ]);
    }
}