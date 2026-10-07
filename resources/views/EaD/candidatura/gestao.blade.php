<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Gestão - Concurso Documental EaD | UniRovuma</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Lucide Icons CDN -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-slate-50 font-sans text-slate-800 min-h-screen flex flex-col" x-data="{ mobileMenuOpen: false }">

    <!-- Header Administrativo Responsivo -->
    <header class="bg-slate-900 border-b border-slate-800 text-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 sm:px-6 py-4 flex justify-between items-center">
            
            <!-- Logo / Título -->
            <div class="flex items-center space-x-3">
                <div class="bg-emerald-600 text-white font-extrabold text-xs px-3 py-2 rounded-xl flex items-center gap-1.5 shadow-sm">
                    <i data-lucide="shield-check" class="w-4 h-4"></i> UniRovuma
                </div>
                <div>
                    <h1 class="text-base sm:text-lg font-bold tracking-tight">Painel EaD 2027</h1>
                    <p class="text-[10px] sm:text-xs text-slate-400">Controlo de Concurso Documental</p>
                </div>
            </div>
            
            <!-- Ações Desktop -->
            <div class="hidden md:flex items-center gap-3">
                <a href="{{ route('candidatura.index') }}" target="_blank" class="bg-slate-800 hover:bg-slate-700 text-slate-200 border border-slate-700 px-3.5 py-2 rounded-xl text-xs font-semibold transition flex items-center gap-2">
                    <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                    <span>Ver Portal Público</span>
                </a>
                
                <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-600/20 hover:bg-red-600 text-red-400 hover:text-white border border-red-500/30 px-3.5 py-2 rounded-xl text-xs font-semibold transition flex items-center gap-1.5">
                        <i data-lucide="log-out" class="w-3.5 h-3.5"></i> Sair
                    </button>
                </form>
            </div>

            <!-- Botão Menu Mobile (Hamburguer) -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-slate-300 hover:text-white focus:outline-none p-2">
                <i data-lucide="menu" class="w-6 h-6" x-show="!mobileMenuOpen"></i>
                <i data-lucide="x" class="w-6 h-6" x-show="mobileMenuOpen" style="display: none;"></i>
            </button>
        </div>

        <!-- Menu Dropdown Mobile -->
        <div class="md:hidden bg-slate-800 border-t border-slate-700 px-6 py-4 space-y-3" x-show="mobileMenuOpen" x-transition style="display: none;">
            <a href="{{ route('candidatura.index') }}" target="_blank" class="flex items-center gap-2 text-slate-200 text-xs font-semibold py-2">
                <i data-lucide="external-link" class="w-4 h-4"></i> Ver Portal Público
            </a>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full text-left flex items-center gap-2 text-red-400 text-xs font-semibold py-2">
                    <i data-lucide="log-out" class="w-4 h-4"></i> Terminar Sessão
                </button>
            </form>
        </div>
    </header>

    <main class="container mx-auto px-4 sm:px-6 py-6 sm:py-8 flex-grow max-w-7xl">
        
        <!-- Cartões de Estatísticas (KPIs) Responsivos -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-6 sm:mb-8">
            <div class="bg-white p-5 sm:p-6 rounded-2xl shadow-sm border border-slate-200/80 flex items-center justify-between">
                <div>
                    <p class="text-[11px] sm:text-xs font-bold uppercase tracking-wider text-slate-400">Total Candidaturas</p>
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">{{ count($candidaturas) }}</h3>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center shadow-sm">
                    <i data-lucide="folder-kanban" class="w-5 h-5 sm:w-6 sm:h-6"></i>
                </div>
            </div>

            <div class="bg-white p-5 sm:p-6 rounded-2xl shadow-sm border border-slate-200/80 flex items-center justify-between">
                <div>
                    <p class="text-[11px] sm:text-xs font-bold uppercase tracking-wider text-slate-400">Regime Atribuído</p>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 mt-1">Ensino à Distância (EaD)</h3>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-teal-50 text-teal-700 flex items-center justify-center shadow-sm">
                    <i data-lucide="graduation-cap" class="w-5 h-5 sm:w-6 sm:h-6"></i>
                </div>
            </div>

            <div class="bg-white p-5 sm:p-6 rounded-2xl shadow-sm border border-slate-200/80 flex items-center justify-between sm:col-span-2 lg:col-span-1">
                <div>
                    <p class="text-[11px] sm:text-xs font-bold uppercase tracking-wider text-slate-400">Método de Admissão</p>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 mt-1">Concurso Documental</h3>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center shadow-sm">
                    <i data-lucide="file-badge" class="w-5 h-5 sm:w-6 sm:h-6"></i>
                </div>
            </div>
        </div>

        <!-- Bloco Principal da Tabela -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden" x-data="{ search: '', cursoFiltro: '' }">
            
            <!-- Barra de Ferramentas / Filtros Responsivos -->
            <div class="p-4 sm:p-6 border-b border-slate-100 flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 bg-slate-50/50">
                <div>
                    <h2 class="text-base sm:text-lg font-bold text-slate-900 flex items-center gap-2">
                        <i data-lucide="users" class="w-5 h-5 text-emerald-800"></i> Candidatos Registados
                    </h2>
                    <p class="text-xs text-slate-500 mt-0.5">Faça a gestão dos perfis e verifique os documentos anexados.</p>
                </div>
                
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 w-full lg:w-auto">
                    <!-- Campo de Pesquisa -->
                    <div class="relative w-full sm:w-64">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400">
                            <i data-lucide="search" class="w-4 h-4"></i>
                        </span>
                        <input type="text" x-model="search" placeholder="Pesquisar por nome ou BI..." class="w-full pl-9 pr-4 py-2.5 sm:py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-emerald-500 outline-none bg-white">
                    </div>
                    
                    <!-- Filtro por Curso -->
                    <div class="relative w-full sm:w-60">
                        <select x-model="cursoFiltro" class="w-full px-3 py-2.5 sm:py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-emerald-500 outline-none bg-white font-medium text-slate-700">
                            <option value="">Filtrar por Todos os Cursos</option>
                            <option value="Licenciatura em Ensino de Inglês">Ensino de Inglês</option>
                            <option value="Licenciatura em Administração e Gestão da Educação">Administração e Gestão da Educação</option>
                            <option value="Licenciatura em Ensino Básico">Ensino Básico</option>
                            <option value="Licenciatura em Ensino de Biologia">Ensino de Biologia</option>
                            <option value="Licenciatura em Ensino de Matemática">Ensino de Matemática</option>
                            <option value="Licenciatura em Ensino de Química">Ensino de Química</option>
                            <option value="Licenciatura em Informática Aplicada">Informática Aplicada</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Tabela com Scroll Responsivo -->
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse min-w-[750px]">
                    <thead>
                        <tr class="bg-slate-100/70 text-slate-600 text-xs font-bold uppercase tracking-wider border-b border-slate-200">
                            <th class="py-3.5 px-4 sm:px-6">Data</th>
                            <th class="py-3.5 px-4 sm:px-6">Candidato / Perfil</th>
                            <th class="py-3.5 px-4 sm:px-6">Contactos</th>
                            <th class="py-3.5 px-4 sm:px-6">Curso Pretendido</th>
                            <th class="py-3.5 px-4 sm:px-6">Documentos</th>
                            <th class="py-3.5 px-4 sm:px-6 text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                        @forelse($candidaturas as $c)
                            <tr class="hover:bg-slate-50/80 transition"
                                x-show="(search === '' || 
                                         '{{ strtolower($c->nome) }}'.includes(search.toLowerCase()) || 
                                         '{{ strtolower($c->bi_numero) }}'.includes(search.toLowerCase())) && 
                                        (cursoFiltro === '' || '{{ $c->curso }}' === cursoFiltro)">
                                
                                <td class="py-4 px-4 sm:px-6 text-xs text-slate-500 whitespace-nowrap font-medium align-top pt-5">
                                    <div class="flex items-center gap-1.5">
                                        <i data-lucide="calendar" class="w-3.5 h-3.5 text-slate-400"></i>
                                        {{ $c->created_at->format('d/m/Y H:i') }}
                                    </div>
                                </td>
                                <td class="py-4 px-4 sm:px-6 align-top">
                                    <div class="font-bold text-slate-900">{{ $c->nome }}</div>
                                    <div class="text-xs text-slate-500 font-mono mt-0.5 flex items-center gap-1">
                                        <i data-lucide="fingerprint" class="w-3 h-3 text-slate-400"></i> BI: {{ $c->bi_numero }}
                                    </div>
                                </td>
                                <td class="py-4 px-4 sm:px-6 align-top">
                                    <div class="text-xs text-slate-800 font-medium flex items-center gap-1">
                                        <i data-lucide="mail" class="w-3 h-3 text-slate-400"></i> {{ $c->email }}
                                    </div>
                                    <div class="text-xs text-slate-500 mt-1 flex items-center gap-1">
                                        <i data-lucide="phone" class="w-3 h-3 text-slate-400"></i> {{ $c->telefone }}
                                    </div>
                                </td>
                                <td class="py-4 px-4 sm:px-6 align-top">
                                    <span class="inline-block bg-emerald-50 text-emerald-800 font-semibold text-xs px-2.5 py-1 rounded-md border border-emerald-200">
                                        {{ $c->curso }}
                                    </span>
                                </td>
                                <td class="py-4 px-4 sm:px-6 align-top">
                                    <div class="flex items-center gap-1.5 flex-wrap max-w-[200px]">
                                        <a href="{{ asset('storage/' . $c->copia_bi) }}" target="_blank" title="Ver Cópia de BI" class="inline-flex items-center gap-1 bg-blue-50 hover:bg-blue-100 text-blue-700 font-semibold px-2 py-1 rounded-md border border-blue-200 text-xs transition">
                                            <i data-lucide="file-text" class="w-3 h-3"></i> BI
                                        </a>
                                        <a href="{{ asset('storage/' . $c->comp_inscricao) }}" target="_blank" title="Ver Inscrição" class="inline-flex items-center gap-1 bg-blue-50 hover:bg-blue-100 text-blue-700 font-semibold px-2 py-1 rounded-md border border-blue-200 text-xs transition">
                                            <i data-lucide="file-check" class="w-3 h-3"></i> Inscrição
                                        </a>
                                        <a href="{{ asset('storage/' . $c->comp_pagamento) }}" target="_blank" title="Ver Pagamento" class="inline-flex items-center gap-1 bg-blue-50 hover:bg-blue-100 text-blue-700 font-semibold px-2 py-1 rounded-md border border-blue-200 text-xs transition">
                                            <i data-lucide="receipt" class="w-3 h-3"></i> Pagamento
                                        </a>
                                        <a href="{{ asset('storage/' . $c->requerimento) }}" target="_blank" title="Ver Requerimento" class="inline-flex items-center gap-1 bg-blue-50 hover:bg-blue-100 text-blue-700 font-semibold px-2 py-1 rounded-md border border-blue-200 text-xs transition">
                                            <i data-lucide="file-badge" class="w-3 h-3"></i> Requerimento
                                        </a>
                                    </div>
                                </td>
                                <td class="py-4 px-4 sm:px-6 text-center align-top">
                                    <form action="{{ route('candidatura.destroy', $c->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja apagar permanentemente esta candidatura?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center gap-1 bg-red-50 hover:bg-red-600 text-red-600 hover:text-white font-semibold px-2.5 py-1.5 rounded-xl border border-red-200 text-xs transition shadow-sm">
                                            <i data-lucide="trash-2" class="w-3.5 h-3.5"></i> Remover
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-12 text-center text-slate-400">
                                    <div class="flex flex-col items-center justify-center space-y-2">
                                        <i data-lucide="folder-open" class="w-10 h-10 text-slate-300"></i>
                                        <p class="text-sm font-medium">Nenhuma candidatura registada até o momento.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </main>

    <!-- Rodapé Minimalista -->
    <footer class="bg-white border-t border-slate-200 text-center py-4 text-xs text-slate-400 mt-auto">
        Universidade Rovuma &copy; 2027 — Instituto Superior de Educação Aberta e a Distância (ISEAD)
    </footer>

    <!-- Inicializar os Lucide Icons -->
    <script>
        lucide.createIcons();
    </script>
</body>
</html>