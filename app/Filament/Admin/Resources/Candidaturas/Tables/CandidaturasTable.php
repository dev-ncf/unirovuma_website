<?php

namespace App\Filament\Admin\Resources\Candidaturas\Tables;

use App\Models\Candidatura;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ZipArchive;

class CandidaturasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nome')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('bi_numero')
                    ->label('Nº de BI')
                    ->searchable(),

                TextColumn::make('email')
                    ->label('E-mail')
                    ->searchable(),

                TextColumn::make('telefone')
                    ->label('Telefone'),

                TextColumn::make('curso')
                    ->label('Curso')
                    ->badge()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Data de Submissão')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('curso')
                    ->label('Filtrar por Curso'),
            ])
            // BOTÕES NO TOPO DA TABELA
            ->headerActions([
                // 1. Exportar lista de todos os candidatos para Excel / CSV
                Action::make('export_csv')
                    ->label('Exportar Lista (Excel/CSV)')
                    ->icon('heroicon-o-document-arrow-down')
                    ->color('success')
                    ->action(fn () => static::exportToCsv()),

                // 2. Baixar todos os documentos de todas as candidaturas num ZIP
                Action::make('download_all_zip')
                    ->label('Baixar Todos Documentos (.ZIP)')
                    ->icon('heroicon-o-archive-box-arrow-down')
                    ->color('primary')
                    ->action(fn () => static::downloadZip(Candidatura::all())),
            ])
            // AÇÕES POR LINHA
            ->recordActions([
                ViewAction::make(),

                ActionGroup::make([
                    Action::make('download_bi')
                        ->label('Baixar Cópia do BI')
                        ->icon('heroicon-o-identification')
                        ->action(fn (Candidatura $record) => Storage::disk('public')->download($record->copia_bi))
                        ->visible(fn (Candidatura $record) => !empty($record->copia_bi)),

                    Action::make('download_inscricao')
                        ->label('Baixar Comp. Inscrição')
                        ->icon('heroicon-o-document-text')
                        ->action(fn (Candidatura $record) => Storage::disk('public')->download($record->comp_inscricao))
                        ->visible(fn (Candidatura $record) => !empty($record->comp_inscricao)),

                    Action::make('download_pagamento')
                        ->label('Baixar Comp. Pagamento')
                        ->icon('heroicon-o-banknotes')
                        ->action(fn (Candidatura $record) => Storage::disk('public')->download($record->comp_pagamento))
                        ->visible(fn (Candidatura $record) => !empty($record->comp_pagamento)),

                    Action::make('download_requerimento')
                        ->label('Baixar Requerimento')
                        ->icon('heroicon-o-clipboard-document-check')
                        ->action(fn (Candidatura $record) => Storage::disk('public')->download($record->requerimento))
                        ->visible(fn (Candidatura $record) => !empty($record->requerimento)),
                ])
                ->label('Baixar Documentos')
                ->icon('heroicon-o-arrow-down-tray'),

                EditAction::make(),
                DeleteAction::make(),
            ])
            // AÇÕES EM MASSA (quando você seleciona checkboxes)
            ->toolbarActions([
                BulkActionGroup::make([
                    // Baixar ZIP apenas das candidaturas selecionadas com o checkbox
                    BulkAction::make('download_selected_zip')
                        ->label('Baixar Documentos Selecionados (.ZIP)')
                        ->icon('heroicon-o-archive-box-arrow-down')
                        ->action(fn (Collection $records) => static::downloadZip($records)),

                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    /**
     * Função que cria o ficheiro ZIP com os documentos organizados por pastas
     */
    protected static function downloadZip(Collection $candidaturas)
    {
        $zipFileName = 'candidaturas_' . now()->format('Y-m-d_H-i-s') . '.zip';
        $zipPath = storage_path('app/' . $zipFileName);

        $zip = new ZipArchive;

        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            foreach ($candidaturas as $candidatura) {
                // Cria uma pasta limpa para cada candidato: Ex: "joao-silva_12345678"
                $pasta = Str::slug($candidatura->nome) . '_' . Str::slug($candidatura->bi_numero) . '/';

                $documentos = [
                    'copia_bi' => $candidatura->copia_bi,
                    'comp_inscricao' => $candidatura->comp_inscricao,
                    'comp_pagamento' => $candidatura->comp_pagamento,
                    'requerimento' => $candidatura->requerimento,
                ];

                foreach ($documentos as $tipo => $caminho) {
                    if ($caminho && Storage::disk('public')->exists($caminho)) {
                        $caminhoCompleto = Storage::disk('public')->path($caminho);
                        $extensao = pathinfo($caminho, PATHINFO_EXTENSION);
                        
                        // Adiciona ao ZIP dentro da pasta do candidato
                        $zip->addFile($caminhoCompleto, $pasta . $tipo . '.' . $extensao);
                    }
                }
            }

            $zip->close();
        }

        // Faz o download e apaga o arquivo temporário do servidor em seguida
        return response()->download($zipPath)->deleteFileAfterSend(true);
    }

    /**
     * Função que exporta todos os dados em CSV compativel com Excel
     */
    protected static function exportToCsv()
    {
        $candidaturas = Candidatura::all();
        $fileName = 'candidaturas_' . now()->format('Y-m-d_H-i') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$fileName}\"",
        ];

        return response()->streamDownload(function () use ($candidaturas) {
            $file = fopen('php://output', 'w');

            // BOM para garantir que acentos abram corretamente no Excel
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

            // Cabeçalho das Colunas
            fputcsv($file, [
                'ID',
                'Nome Completo',
                'Nº do BI',
                'E-mail',
                'Telefone',
                'Curso',
                'Data de Submissão',
            ], ';');

            // Linhas com os dados
            foreach ($candidaturas as $c) {
                fputcsv($file, [
                    $c->id,
                    $c->nome,
                    $c->bi_numero,
                    $c->email,
                    $c->telefone,
                    $c->curso,
                    $c->created_at ? $c->created_at->format('d/m/Y H:i') : '',
                ], ';');
            }

            fclose($file);
        }, $fileName, $headers);
    }
}