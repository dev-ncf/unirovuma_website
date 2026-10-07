@extends('layouts.app')

@section('content')
<main class="container mx-auto px-4 py-8 max-w-3xl">
    
    <!-- Botão de Voltar -->
    <div class="mb-6">
        <a href="{{ route('candidatura.index') }}" class="inline-flex items-center text-sm font-semibold text-emerald-800 hover:text-emerald-700 transition">
            <i data-lucide="arrow-left" class="w-4 h-4 mr-1.5"></i> Voltar às Informações e Cursos
        </a>
    </div>

    @php
        // Data de abertura: 15 de Outubro de 2026
        $dataAbertura = \Carbon\Carbon::create(2026, 10, 15, 0, 0, 0);
        $hoje = \Carbon\Carbon::now();
        $inscricoesAbertas = $hoje->greaterThanOrEqualTo($dataAbertura);
    @endphp

    @if(!$inscricoesAbertas)
        <!-- AVISO DE PERÍODO INDISPONÍVEL -->
        <div class="bg-white rounded-2xl shadow-md p-8 md:p-10 border-t-4 border-amber-500 text-center">
            <div class="w-16 h-16 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-sm">
                <i data-lucide="clock" class="w-8 h-8"></i>
            </div>
            <h2 class="text-2xl font-bold text-slate-900 mb-2">Inscrições Brevemente Disponíveis</h2>
            <p class="text-slate-600 text-sm max-w-md mx-auto mb-6 leading-relaxed">
                O período de submissão de candidaturas via Concurso Documental (CD) para os cursos EaD da Universidade Rovuma (2027) terá início oficial no dia <strong>15 de Outubro de 2026</strong>.
            </p>
            <div class="inline-flex items-center gap-2 bg-amber-50 border border-amber-200 text-amber-800 text-xs font-semibold px-4 py-2 rounded-xl mb-6">
                <i data-lucide="calendar" class="w-4 h-4"></i> Abertura prevista para: 15/10/2026
            </div>
            <div>
                <a href="{{ route('candidatura.index') }}" class="inline-flex items-center justify-center bg-slate-900 hover:bg-slate-800 text-white font-bold py-2.5 px-6 rounded-xl transition text-sm shadow">
                    <i data-lucide="home" class="w-4 h-4 mr-2"></i> Voltar à Página Principal
                </a>
            </div>
        </div>
    @else

        <!-- ERROS DE VALIDAÇÃO -->
        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-xl shadow-sm flex items-start gap-3" role="alert">
                <i data-lucide="alert-circle" class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0"></i>
                <div>
                    <p class="font-bold">Atenção aos seguintes erros:</p>
                    <ul class="list-disc list-inside text-sm mt-1 space-y-0.5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- FORMULÁRIO DE INSCRIÇÃO -->
        <div class="bg-white rounded-2xl shadow-md p-6 md:p-8 border-t-4 border-emerald-800">
            <div class="flex items-center gap-3 mb-2">
                <div class="p-2 bg-emerald-50 text-emerald-800 rounded-xl">
                    <i data-lucide="file-edit" class="w-6 h-6"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-slate-800">Formulário de Inscrição - EaD 2027</h2>
                    <p class="text-xs text-slate-500">Concurso Documental (CD) — Universidade Rovuma</p>
                </div>
            </div>
            <p class="text-sm text-slate-600 mb-6 border-b pb-4">Preencha o seu perfil acadêmico e submeta os documentos necessários.</p>
            
            <form action="{{ route('candidatura.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <!-- 1. Dados Pessoais / Perfil -->
                <div>
                    <h3 class="text-md font-semibold text-emerald-800 mb-3 flex items-center gap-2">
                        <i data-lucide="user" class="w-4 h-4"></i> 1. Dados Pessoais e Perfil
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-slate-700 mb-1">Nome Completo</label>
                            <input type="text" name="nome" value="{{ old('nome') }}" required class="w-full border rounded-xl px-3.5 py-2.5 outline-none focus:ring-2 focus:ring-emerald-500 text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-700 mb-1">Número de BI</label>
                            <input type="text" name="bi_numero" value="{{ old('bi_numero') }}" required class="w-full border rounded-xl px-3.5 py-2.5 outline-none focus:ring-2 focus:ring-emerald-500 text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-700 mb-1">Correio Eletrónico (Email)</label>
                            <input type="email" name="email" value="{{ old('email') }}" required class="w-full border rounded-xl px-3.5 py-2.5 outline-none focus:ring-2 focus:ring-emerald-500 text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-700 mb-1">Contacto Telefónico</label>
                            <input type="text" name="telefone" value="{{ old('telefone') }}" required class="w-full border rounded-xl px-3.5 py-2.5 outline-none focus:ring-2 focus:ring-emerald-500 text-sm">
                        </div>
                    </div>
                </div>

                <!-- 2. Seleção do Curso EaD -->
                <div>
                    <h3 class="text-md font-semibold text-emerald-800 mb-3 flex items-center gap-2">
                        <i data-lucide="graduation-cap" class="w-4 h-4"></i> 2. Seleção do Curso
                    </h3>
                    <label class="block text-xs font-medium text-slate-700 mb-1">Escolha a Licenciatura pretendida:</label>
                    <select name="curso" required class="w-full border rounded-xl px-3.5 py-2.5 outline-none focus:ring-2 focus:ring-emerald-500 text-sm bg-white">
                        <option value="">-- Selecione o Curso EaD --</option>
                        <option value="Licenciatura em Ensino de Inglês" {{ old('curso') == 'Licenciatura em Ensino de Inglês' ? 'selected' : '' }}>Licenciatura em Ensino de Inglês</option>
                        <option value="Licenciatura em Administração e Gestão da Educação" {{ old('curso') == 'Licenciatura em Administração e Gestão da Educação' ? 'selected' : '' }}>Licenciatura em Administração e Gestão da Educação</option>
                        <option value="Licenciatura em Ensino Básico" {{ old('curso') == 'Licenciatura em Ensino Básico' ? 'selected' : '' }}>Licenciatura em Ensino Básico</option>
                        <option value="Licenciatura em Ensino de Biologia" {{ old('curso') == 'Licenciatura em Ensino de Biologia' ? 'selected' : '' }}>Licenciatura em Ensino de Biologia</option>
                        <option value="Licenciatura em Ensino de Matemática" {{ old('curso') == 'Licenciatura em Ensino de Matemática' ? 'selected' : '' }}>Licenciatura em Ensino de Matemática</option>
                        <option value="Licenciatura em Ensino de Química" {{ old('curso') == 'Licenciatura em Ensino de Química' ? 'selected' : '' }}>Licenciatura em Ensino de Química</option>
                        <option value="Licenciatura em Informática Aplicada" {{ old('curso') == 'Licenciatura em Informática Aplicada' ? 'selected' : '' }}>Licenciatura em Informática Aplicada</option>
                    </select>
                </div>

                <!-- 3. Anexo de Documentos -->
                <div>
                    <h3 class="text-md font-semibold text-emerald-800 mb-3 flex items-center gap-2">
                        <i data-lucide="paperclip" class="w-4 h-4"></i> 3. Anexo de Documentos (PDF ou Imagem)
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="p-3 bg-slate-50 border rounded-xl">
                            <label class="block text-xs font-medium text-slate-700 mb-1 flex items-center gap-1.5"><i data-lucide="file-text" class="w-3.5 h-3.5 text-slate-500"></i> Cópia de BI</label>
                            <input type="file" name="copia_bi" accept=".pdf,image/*" required class="w-full text-xs text-slate-500 file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                        </div>
                        <div class="p-3 bg-slate-50 border rounded-xl">
                            <label class="block text-xs font-medium text-slate-700 mb-1 flex items-center gap-1.5"><i data-lucide="file-check" class="w-3.5 h-3.5 text-slate-500"></i> Comprovativo de Inscrição</label>
                            <input type="file" name="comp_inscricao" accept=".pdf,image/*" required class="w-full text-xs text-slate-500 file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                        </div>
                        <div class="p-3 bg-slate-50 border rounded-xl">
                            <label class="block text-xs font-medium text-slate-700 mb-1 flex items-center gap-1.5"><i data-lucide="receipt" class="w-3.5 h-3.5 text-slate-500"></i> Comprovativo de Pagamento</label>
                            <input type="file" name="comp_pagamento" accept=".pdf,image/*" required class="w-full text-xs text-slate-500 file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                        </div>
                        <div class="p-3 bg-slate-50 border rounded-xl">
                            <label class="block text-xs font-medium text-slate-700 mb-1 flex items-center gap-1.5"><i data-lucide="file-badge" class="w-3.5 h-3.5 text-slate-500"></i> Requerimento</label>
                            <input type="file" name="requerimento" accept=".pdf,image/*" required class="w-full text-xs text-slate-500 file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                        </div>
                    </div>
                </div>

                <!-- Botão de Envio -->
                <div class="pt-4">
                    <button type="submit" class="w-full bg-emerald-800 hover:bg-emerald-900 text-white font-bold py-3.5 px-4 rounded-xl transition shadow-lg shadow-emerald-900/20 flex items-center justify-center gap-2 text-sm">
                        <i data-lucide="send" class="w-4 h-4"></i> Submeter Candidatura Definitiva
                    </button>
                </div>
            </form>
        </div>
    @endif
</main>
@endsection