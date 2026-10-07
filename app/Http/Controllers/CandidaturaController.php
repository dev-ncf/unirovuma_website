<?php

namespace App\Http\Controllers;

use App\Models\Candidatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CandidaturaController extends Controller {
    // Mostra o formulário público
    public function index() {
        return view('EaD.candidatura.index');
    }
    public function create() {
    return view('EaD.candidatura.create');
}

    // Grava a submissão e os documentos
    public function store(Request $request) {
        $request->validate([
            'nome' => 'required|string|max:255',
            'bi_numero' => 'required|string|max:50|unique:candidaturas,bi_numero',
            'email' => 'required|email|max:255|unique:candidaturas,email',
            'telefone' => 'required|string|max:30|unique:candidaturas,telefone',
            'curso' => 'required|string',
            'copia_bi' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
            'comp_inscricao' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
            'comp_pagamento' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
            'requerimento' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Guardar documentos na pasta 'storage/app/public/documentos'
        $biPath = $request->file('copia_bi')->store('documentos', 'public');
        $inscricaoPath = $request->file('comp_inscricao')->store('documentos', 'public');
        $pagamentoPath = $request->file('comp_pagamento')->store('documentos', 'public');
        $requerimentoPath = $request->file('requerimento')->store('documentos', 'public');

        Candidatura::create([
            'nome' => $request->nome,
            'bi_numero' => $request->bi_numero,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'curso' => $request->curso,
            'copia_bi' => $biPath,
            'comp_inscricao' => $inscricaoPath,
            'comp_pagamento' => $pagamentoPath,
            'requerimento' => $requerimentoPath,
        ]);

        return redirect()->route('candidatura.index')->with('success', 'Candidatura submetida com sucesso via Concurso Documental!');
    }

    // Painel de Gestão (Admin)
    public function gestao() {
        $candidaturas = Candidatura::latest()->get();
        return view('EaD.candidatura.gestao', compact('candidaturas'));
    }

    // Apagar Candidatura
    public function destroy($id) {
        $candidatura = Candidatura::findOrFail($id);
        
        // Apagar ficheiros do storage físico
        Storage::disk('public')->delete([
            $candidatura->copia_bi,
            $candidatura->comp_inscricao,
            $candidatura->comp_pagamento,
            $candidatura->requerimento
        ]);

        $candidatura->delete();

        return redirect()->route('candidatura.gestao')->with('success', 'Candidatura eliminada com sucesso.');
    }
}