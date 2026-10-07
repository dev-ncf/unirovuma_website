@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-slate-50 to-slate-100 py-10">
    <main class="container mx-auto px-4 max-w-5xl">
        
        <!-- Alerta de Sucesso -->
        @if(session('success'))
            <div class="bg-emerald-50 border-l-4 border-emerald-600 text-emerald-800 p-4 mb-6 rounded-r-xl shadow-md flex items-center justify-between" role="alert">
                <div class="flex items-center gap-3">
                    <i data-lucide="check-circle-2" class="w-6 h-6 text-emerald-600 flex-shrink-0"></i>
                    <div>
                        <p class="font-bold">Candidatura Submetida com Sucesso!</p>
                        <p class="text-sm mt-0.5">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Banner Institucional -->
        <div class="bg-gradient-to-r from-emerald-950 via-emerald-900 to-teal-900 rounded-2xl shadow-xl text-white p-8 mb-8 relative overflow-hidden">
            <div class="absolute -right-10 -bottom-10 w-60 h-60 bg-emerald-800 rounded-full opacity-25 blur-2xl pointer-events-none"></div>
            <div class="relative z-10">
                <span class="bg-amber-500/20 text-amber-300 border border-amber-500/30 text-xs font-semibold px-3 py-1 rounded-full uppercase tracking-wider inline-flex items-center gap-1.5">
                    <i data-lucide="sparkles" class="w-3.5 h-3.5"></i> Ano Académico 2027
                </span>
                <h1 class="text-2xl md:text-4xl font-extrabold tracking-tight mt-3">Universidade Rovuma</h1>
                <p class="text-emerald-200 text-sm md:text-base mt-1 font-medium flex items-center gap-2">
                    <i data-lucide="book-open" class="w-4 h-4"></i> Instituto Superior de Educação Aberta e a Distância (ISEAD)
                </p>
                <p class="text-slate-300 text-xs mt-3 max-w-2xl leading-relaxed">
                    Formação superior de excelência e flexibilidade através do Ensino à Distância (EaD). Consulte abaixo os cursos disponíveis, documentos e procedimentos.
                </p>
            </div>
        </div>

        <!-- NOTA IMPORTANTE -->
        <div class="bg-amber-50 border-l-4 border-amber-500 p-5 mb-8 rounded-r-xl shadow-sm flex items-start space-x-4">
            <i data-lucide="info" class="w-6 h-6 text-amber-600 flex-shrink-0 mt-0.5"></i>
            <div>
                <h3 class="font-bold text-amber-900 text-base">Nota Importante: Admissão EaD 2027</h3>
                <p class="text-sm text-amber-800 mt-1 leading-relaxed">
                    Para o ano de 2027, a admissão aos cursos do Ensino à Distância (EaD) na UniRovuma será feita exclusivamente via <strong>Concurso Documental (CD)</strong>. Consulte os requisitos no <a href="https://www.unirovuma.ac.mz/admissao-ensino-a-distancia" target="_blank" class="underline font-semibold hover:text-amber-950 transition inline-flex items-center gap-0.5">portal oficial <i data-lucide="external-link" class="w-3 h-3"></i></a>.
                </p>
            </div>
        </div>

        <!-- TABELA DE CURSOS -->
        <div class="bg-white rounded-2xl shadow-md border border-slate-200/80 overflow-hidden mb-8">
            <div class="p-6 md:p-8 border-b border-slate-100 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h2 class="text-xl font-bold text-slate-900 flex items-center gap-2">
                        <i data-lucide="list-tree" class="w-5 h-5 text-emerald-800"></i> Cursos de Licenciatura EaD
                    </h2>
                    <p class="text-xs text-slate-500 mt-0.5">Consulte as vagas fixadas e os requisitos essenciais de acesso.</p>
                </div>
                <div>
                    <a href="{{ route('candidatura.create') }}" class="inline-flex items-center justify-center bg-emerald-800 hover:bg-emerald-900 text-white font-bold px-6 py-3 rounded-xl shadow-lg shadow-emerald-900/20 transition transform hover:-translate-y-0.5 text-sm gap-2">
                        <span>Inscrever-se Agora</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 text-slate-600 text-xs font-bold uppercase tracking-wider border-b border-slate-200">
                            <th class="py-4 px-6">Curso / Licenciatura</th>
                            <th class="py-4 px-4 text-center">Regime</th>
                            <th class="py-4 px-4 text-center">Vagas</th>
                            <th class="py-4 px-4 text-center">Admissão</th>
                            <th class="py-4 px-6">Requisito para o Acesso</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                        @php
                            $cursos = [
                                "Licenciatura em Ensino de Inglês",
                                "Licenciatura em Administração e Gestão da Educação",
                                "Licenciatura em Ensino Básico",
                                "Licenciatura em Ensino de Biologia",
                                "Licenciatura em Ensino de Matemática",
                                "Licenciatura em Ensino de Química",
                                "Licenciatura em Informática Aplicada"
                            ];
                        @endphp

                        @foreach($cursos as $curso)
                            <tr class="hover:bg-slate-50/80 transition">
                                <td class="py-4 px-6 font-semibold text-slate-900 flex items-center gap-3">
                                    <span class="w-2 h-2 rounded-full bg-emerald-600"></span>
                                    {{ $curso }}
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <span class="bg-emerald-50 text-emerald-800 font-semibold text-xs px-2.5 py-1 rounded-md border border-emerald-200">EaD</span>
                                </td>
                                <td class="py-4 px-4 text-center font-bold text-slate-900">120</td>
                                <td class="py-4 px-4 text-center text-xs font-medium text-slate-600">Concurso Documental</td>
                                <td class="py-4 px-6 text-xs text-slate-500 leading-relaxed">12ª Classe do SNE, Ensino Técnico Profissional (ou equivalente)</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="bg-slate-50/70 border-t border-slate-200 font-bold text-slate-800">
                            <td colspan="2" class="py-3 px-6 text-right">SubTotal Estimado:</td>
                            <td class="py-3 px-4 text-center text-emerald-800">815</td>
                            <td colspan="2" class="py-3 px-6"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <!-- DOCUMENTOS NECESSÁRIOS -->
        <div class="bg-white rounded-2xl shadow-md border border-slate-200/80 p-6 md:p-8 mb-10">
            <div class="border-b border-slate-100 pb-4 mb-6">
                <h2 class="text-xl font-bold text-slate-900 flex items-center gap-2">
                    <i data-lucide="folder-kanban" class="w-5 h-5 text-emerald-800"></i> Documentos Necessários para a Submissão
                </h2>
                <p class="text-xs text-slate-500 mt-0.5">Certifique-se de ter os seguintes documentos digitalizados:</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex items-start p-4 rounded-xl bg-slate-50 border border-slate-200/60">
                    <div class="bg-emerald-100 text-emerald-800 font-bold rounded-lg p-2.5 mr-4"><i data-lucide="file-text" class="w-5 h-5"></i></div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">Cópia de BI</h4>
                        <p class="text-xs text-slate-500 mt-0.5">Documento de identificação pessoal válido em formato digital.</p>
                    </div>
                </div>

                <div class="flex items-start p-4 rounded-xl bg-slate-50 border border-slate-200/60">
                    <div class="bg-emerald-100 text-emerald-800 font-bold rounded-lg p-2.5 mr-4"><i data-lucide="file-check" class="w-5 h-5"></i></div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">Comprovativo de Inscrição</h4>
                        <p class="text-xs text-slate-500 mt-0.5">Ficha ou comprovativo oficial de pré-inscrição.</p>
                    </div>
                </div>

                <div class="flex items-start p-4 rounded-xl bg-slate-50 border border-slate-200/60">
                    <div class="bg-emerald-100 text-emerald-800 font-bold rounded-lg p-2.5 mr-4"><i data-lucide="receipt" class="w-5 h-5"></i></div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">Comprovativo de Pagamento</h4>
                        <p class="text-xs text-slate-500 mt-0.5">Recibo ou talão de depósito bancário/RUPE.</p>
                    </div>
                </div>

                <div class="flex items-start p-4 rounded-xl bg-slate-50 border border-slate-200/60">
                    <div class="bg-emerald-100 text-emerald-800 font-bold rounded-lg p-2.5 mr-4"><i data-lucide="file-badge" class="w-5 h-5"></i></div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">Requerimento</h4>
                        <p class="text-xs text-slate-500 mt-0.5">Requerimento próprio dirigido ao Magnífico Reitor.</p>
                    </div>
                </div>
            </div>

            <div class="mt-8 text-center bg-emerald-50/50 border border-emerald-100 p-6 rounded-xl flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="text-left">
                    <h5 class="font-bold text-emerald-900 text-sm">Já possui todos os documentos?</h5>
                    <p class="text-xs text-emerald-700 mt-0.5">Pode avançar com o seu registo de perfil e anexação imediata.</p>
                </div>
                <a href="{{ route('candidatura.create') }}" class="bg-emerald-800 hover:bg-emerald-900 text-white font-bold px-6 py-2.5 rounded-xl shadow transition text-sm whitespace-nowrap inline-flex items-center gap-2">
                    <span>Avançar para Inscrição</span>
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>
        </div>

    </main>
</div>
@endsection