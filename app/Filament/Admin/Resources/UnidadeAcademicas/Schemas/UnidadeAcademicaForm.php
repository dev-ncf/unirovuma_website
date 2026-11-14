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
use Filament\Schemas\Components\Tabs;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TagsInput;

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
                            ->options(fn() => MenuItem::pluck('titulo', 'titulo')->toArray())
                            ->searchable()
                            ->preload()
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),

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

                Section::make('Projectos e Programas de Investigação')
                    ->description('Registo de projectos da unidade. Pode ser simples ou com estrutura temática completa (Cursos, Laboratórios, Actividades).')
                    ->schema([
                        Repeater::make('projetos')
                            ->relationship('projetos')
                            ->label('Projectos')
                            ->collapsible()
                            ->itemLabel(fn(array $state): ?string => $state['titulo'] ?? 'Novo Projecto')
                            ->schema([
                                TextInput::make('titulo')
                                    ->label('Título do Projecto')
                                    ->required()
                                    ->maxLength(255),

                                Textarea::make('descricao')
                                    ->label('Resumo Geral')
                                    ->rows(2)
                                    ->required(),

                                Toggle::make('tem_estrutura_completa')
                                    ->label('Activar Estrutura Avançada (Cursos, Lab, Notícias/Actividades)?')
                                    ->helperText('Active caso este projecto necessite de página temática com abas como o SLSIM.')
                                    ->live(),

                                // ABAS AVANÇADAS DO PROJECTO
                                Tabs::make('Detalhes do Projecto')
                                    ->visible(fn($get) => (bool) $get('tem_estrutura_completa'))
                                    ->tabs([
                                        Tabs\Tab::make('1. Sobre o Projecto')
                                            ->schema([
                                                RichEditor::make('sobre')
                                                    ->label('Texto Institucional / Contexto & Objectivos')
                                                    ->toolbarButtons(['bold', 'italic', 'bulletList', 'orderedList', 'h2', 'h3', 'link']),

                                                FileUpload::make('anexos')
                                                    ->label('Documentos / Anexos Gerais')
                                                    ->multiple()
                                                    ->downloadable()
                                                    ->disk('public')
                                                    ->directory('projetos-anexos'),
                                            ]),

                                        Tabs\Tab::make('2. Cursos Desenvolvidos')
                                            ->schema([
                                                Repeater::make('cursos_desenvolvidos')
                                                    ->label('Cursos')
                                                    ->schema([
                                                        TextInput::make('nome')->label('Nome da Curso')->required(),
                                                        TextInput::make('codigo')->label('Código (Ex: FAEDEMALEE-302-A)')->required(),
                                                        TextInput::make('nivel')->label('Nível')->default('Nível 3'),
                                                        TextInput::make('ano')->label('Ano')->default('3.º ano'),
                                                        TextInput::make('semestre')->label('Semestre')->default('7.º semestre'),
                                                        TextInput::make('creditos')->label('Créditos')->default('5'),
                                                        TextInput::make('carga_horaria')->label('Carga Horária')->placeholder('150 horas (64h contacto...)'),
                                                        TextInput::make('pre_requisitos')->label('Pré-requisitos')->columnSpanFull(),
                                                        Textarea::make('resumo')->label('Ementa / Breve Descrição')->rows(2)->columnSpanFull(),
                                                        Textarea::make('objectivos')->label('Objectivos Principais (1 por linha)')->rows(3)->columnSpanFull(),

                                                        FileUpload::make('fotos')
                                                            ->label('Fotografias do Curso')
                                                            ->image()
                                                            ->multiple()
                                                            ->reorderable()
                                                            ->disk('public')
                                                            ->directory('projetos-cursos')
                                                            ->columnSpanFull(),

                                                        FileUpload::make('plano_pdf')
                                                            ->label('Ficheiro do Plano Temático (PDF/Word)')
                                                            ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                                                            ->disk('public')
                                                            ->directory('projetos-planos')
                                                            ->columnSpanFull(),
                                                    ])
                                                    ->columns(3)
                                                    ->itemLabel(fn(array $state): ?string => $state['nome'] ?? null),
                                            ]),

                                        Tabs\Tab::make('3. Laboratório')
                                            ->schema([
                                                RichEditor::make('laboratorio.descricao')
                                                    ->label('Descrição Institucional do Laboratório'),
                                                TagsInput::make('laboratorio.equipamentos')
                                                    ->label('Equipamentos e Recursos Principais')
                                                    ->placeholder('Adicionar equipamento e pressionar Enter'),
                                                FileUpload::make('laboratorio.fotos')
                                                    ->label('Galeria de Fotografias do Laboratório')
                                                    ->image()
                                                    ->multiple()
                                                    ->disk('public')
                                                    ->directory('projetos-laboratorio')
                                                    ->columnSpanFull(),
                                            ]),

                                        Tabs\Tab::make('4. Notícias e Actividades')
                                            ->schema([
                                                Repeater::make('atividades')
                                                    ->label('Actividades e Notícias Realizadas')
                                                    ->schema([
                                                        TextInput::make('data')->label('Data ou Período')->placeholder('Ex: 28/09/2026 ou 16–18/06/2025')->required(),
                                                        TextInput::make('titulo')->label('Título da Actividade')->required()->columnSpan(2),
                                                        TextInput::make('local')->label('Local (Ex: Maputo, Songo, Nampula)'),
                                                        TextInput::make('entidades')->label('Entidades Participantes')->columnSpan(2),
                                                        Textarea::make('texto')->label('Descrição / Notícia')->rows(3)->columnSpanFull(),
                                                        FileUpload::make('fotos')
                                                            ->label('Fotografias da Actividade')
                                                            ->image()
                                                            ->multiple()
                                                            ->disk('public')
                                                            ->directory('projetos-actividades')
                                                            ->columnSpanFull(),
                                                    ])
                                                    ->columns(3)
                                                    ->itemLabel(fn(array $state): ?string => ($state['data'] ?? '') . ' - ' . ($state['titulo'] ?? 'Actividade')),
                                            ]),
                                    ])
                                    ->columnSpanFull(),
                            ])
                            ->columnSpanFull()
                    ]),
            ]);
    }
}
