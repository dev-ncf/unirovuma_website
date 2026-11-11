<?php
use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('components.layouts.app')] class extends Component {
    public $id;
    public $projeto;
    public $unidade;

    public function mount($id)
    {
        $this->id = $id;
        $this->projeto = \App\Models\UnidadeProjeto::findOrFail($id);

        if (method_exists($this->projeto, 'unidadeAcademica') && $this->projeto->unidadeAcademica) {
            $this->unidade = $this->projeto->unidadeAcademica;
        } elseif (!empty($this->projeto->unidade_academica_id)) {
            $this->unidade = \App\Models\UnidadeAcademica::find($this->projeto->unidade_academica_id);
        }
    }
};
?>

<div class="bg-slate-50 min-h-screen py-8 font-sans" x-data="{ tab: 'sobre' }">
    <div class="container mx-auto px-4 max-w-6xl">

        <!-- Barra de Navegação de Topo -->
        <div class="mb-6 flex items-center justify-between">
            @if ($unidade)
                <a href="{{ url('/unidade/' . $unidade->slug) }}"
                    class="text-xs font-bold text-blue-900 hover:text-yellow-600 transition flex items-center gap-1.5">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i> Voltar para {{ $unidade->nome }}
                </a>
            @else
                <a href="javascript:history.back()"
                    class="text-xs font-bold text-blue-900 hover:text-yellow-600 transition flex items-center gap-1.5">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i> Voltar
                </a>
            @endif

            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">
                UniRovuma &bull; Projectos de Investigação e Ensino
            </span>
        </div>

        <!-- Cabeçalho Institucional -->
        <div class="bg-[#00225a] rounded-3xl shadow-xl text-white p-8 md:p-12 mb-8 relative overflow-hidden">
            <div class="absolute right-0 top-0 w-96 h-96 bg-yellow-500/10 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10 space-y-4 max-w-4xl">
                <div class="flex items-center gap-2">
                    <span class="bg-yellow-500 text-[#00225a] text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full">
                        Projecto de Cooperação & Inovação
                    </span>
                    @if ($unidade)
                        <span class="text-xs text-blue-200">
                            &bull; {{ $unidade->nome }}
                        </span>
                    @endif
                </div>

                <h1 class="text-3xl md:text-5xl font-black tracking-tight leading-tight text-white">
                    {{ $projeto->titulo }}
                </h1>

                <p class="text-slate-300 text-sm md:text-base leading-relaxed max-w-3xl">
                    {{ $projeto->descricao }}
                </p>
            </div>

            @if ($projeto->tem_estrutura_completa)
                <!-- TAB MENU PRINCIPAL (ESTILO SLSIM) -->
                <div class="flex items-center gap-2 overflow-x-auto pt-8 border-t border-white/10 mt-8 scrollbar-none">
                    <button @click="tab = 'sobre'"
                        :class="tab === 'sobre' ? 'bg-yellow-500 text-[#00225a] font-bold shadow-md' : 'text-blue-100 hover:bg-white/10 font-medium'"
                        class="px-4 py-2.5 rounded-xl text-xs md:text-sm whitespace-nowrap transition flex items-center gap-2">
                        <i data-lucide="info" class="w-4 h-4"></i> 1. Sobre o Projecto
                    </button>

                    <button @click="tab = 'cursos'"
                        :class="tab === 'cursos' ? 'bg-yellow-500 text-[#00225a] font-bold shadow-md' : 'text-blue-100 hover:bg-white/10 font-medium'"
                        class="px-4 py-2.5 rounded-xl text-xs md:text-sm whitespace-nowrap transition flex items-center gap-2">
                        <i data-lucide="graduation-cap" class="w-4 h-4"></i> 2. Cursos Desenvolvidos
                        @if(!empty($projeto->cursos_desenvolvidos))
                            <span class="bg-white/20 px-1.5 py-0.5 rounded-full text-[10px]">
                                {{ count($projeto->cursos_desenvolvidos) }}
                            </span>
                        @endif
                    </button>

                    <button @click="tab = 'laboratorio'"
                        :class="tab === 'laboratorio' ? 'bg-yellow-500 text-[#00225a] font-bold shadow-md' : 'text-blue-100 hover:bg-white/10 font-medium'"
                        class="px-4 py-2.5 rounded-xl text-xs md:text-sm whitespace-nowrap transition flex items-center gap-2">
                        <i data-lucide="flask-conical" class="w-4 h-4"></i> 3. Laboratório Desenvolvido
                    </button>

                    <button @click="tab = 'atividades'"
                        :class="tab === 'atividades' ? 'bg-yellow-500 text-[#00225a] font-bold shadow-md' : 'text-blue-100 hover:bg-white/10 font-medium'"
                        class="px-4 py-2.5 rounded-xl text-xs md:text-sm whitespace-nowrap transition flex items-center gap-2">
                        <i data-lucide="calendar" class="w-4 h-4"></i> 4. Notícias & Actividades
                        @if(!empty($projeto->atividades))
                            <span class="bg-white/20 px-1.5 py-0.5 rounded-full text-[10px]">
                                {{ count($projeto->atividades) }}
                            </span>
                        @endif
                    </button>
                </div>
            @endif
        </div>

        <!-- CORPO DAS SECÇÕES -->
        <div class="space-y-8">

            @if ($projeto->tem_estrutura_completa)

                <!-- ================= ABA 1: SOBRE O PROJECTO ================= -->
                <div x-show="tab === 'sobre'" x-transition class="space-y-6">
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 p-6 md:p-10">
                        <h2 class="text-xl font-bold text-blue-900 border-b pb-4 mb-6 flex items-center gap-2">
                            <i data-lucide="target" class="w-6 h-6 text-yellow-500"></i> Contexto & Objectivo do Projecto
                        </h2>

                        <div class="prose max-w-none text-slate-700 leading-relaxed space-y-4">
                            @if (!empty($projeto->sobre))
                                {!! $projeto->sobre !!}
                            @else
                                <p class="text-slate-600 leading-relaxed">
                                    {{ $projeto->descricao }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <!-- Anexos Gerais se houver -->
                    @if (!empty($projeto->anexos))
                        <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 p-6 md:p-8">
                            <h3 class="text-base font-bold text-blue-900 mb-4 flex items-center gap-2">
                                <i data-lucide="paperclip" class="w-4 h-4 text-yellow-500"></i> Documentação Geral do Projecto
                            </h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
                                @foreach ($projeto->anexos as $anexo)
                                    <a href="{{ asset('storage/' . $anexo) }}" target="_blank"
                                        class="flex items-center justify-between p-3.5 rounded-xl bg-slate-50 border border-slate-200 hover:border-blue-500 hover:bg-blue-50/30 transition">
                                        <div class="overflow-hidden">
                                            <p class="text-xs font-bold text-slate-800 truncate">{{ basename($anexo) }}</p>
                                            <span class="text-[10px] text-slate-400">Descarregar ficheiro</span>
                                        </div>
                                        <i data-lucide="download" class="w-4 h-4 text-blue-900 flex-shrink-0"></i>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- ================= ABA 2: CURSOS DESENVOLVIDOS ================= -->
                <div x-show="tab === 'cursos'" x-transition class="space-y-6">
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 p-6 md:p-8">
                        <h2 class="text-xl font-bold text-blue-900 border-b pb-4 mb-2 flex items-center gap-2">
                            <i data-lucide="book-open" class="w-6 h-6 text-yellow-500"></i> Cursos & Disciplinas Desenvolvidas
                        </h2>
                        <p class="text-xs text-slate-500 mb-8">
                            Consulte a ficha técnica de cada disciplina concebida no âmbito do projecto e descarregue o respectivo Plano Temático.
                        </p>

                        @if (!empty($projeto->cursos_desenvolvidos) && count($projeto->cursos_desenvolvidos) > 0)
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                                @foreach ($projeto->cursos_desenvolvidos as $curso)
                                    <div class="rounded-2xl border border-slate-200 bg-slate-50/50 p-6 flex flex-col justify-between shadow-sm">
                                        <div>
                                            <div class="flex items-start justify-between gap-4 mb-3">
                                                <h3 class="text-lg font-black text-blue-950">
                                                    {{ $curso['nome'] ?? 'Disciplina' }}
                                                </h3>
                                                <span class="text-[11px] font-mono font-bold bg-blue-100 text-blue-800 px-2.5 py-1 rounded-md">
                                                    {{ $curso['codigo'] ?? '-' }}
                                                </span>
                                            </div>

                                            <p class="text-xs text-slate-600 leading-relaxed mb-6">
                                                {{ $curso['resumo'] ?? '' }}
                                            </p>

                                            <!-- Tabela / Metadados Académicos -->
                                            <div class="grid grid-cols-2 gap-2 text-xs bg-white p-4 rounded-xl border border-slate-200/70 mb-6">
                                                <div><span class="text-slate-400">Nível:</span> <span class="font-bold text-slate-700">{{ $curso['nivel'] ?? '-' }}</span></div>
                                                <div><span class="text-slate-400">Ano/Semestre:</span> <span class="font-bold text-slate-700">{{ $curso['ano'] ?? '-' }} ({{ $curso['semestre'] ?? '-' }})</span></div>
                                                <div><span class="text-slate-400">Créditos:</span> <span class="font-bold text-slate-700">{{ $curso['creditos'] ?? '-' }}</span></div>
                                                <div><span class="text-slate-400">Carga Horária:</span> <span class="font-bold text-slate-700">{{ $curso['carga_horaria'] ?? '-' }}</span></div>
                                                <div class="col-span-2 pt-1 border-t border-slate-100">
                                                    <span class="text-slate-400">Pré-requisitos:</span> 
                                                    <span class="font-medium text-slate-700">{{ $curso['pre_requisitos'] ?? 'Nenhum' }}</span>
                                                </div>
                                            </div>

                                            <!-- Objectivos -->
                                            @if (!empty($curso['objectivos']))
                                                <div class="mb-6">
                                                    <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider mb-2">Objectivos Principais:</h4>
                                                    <div class="text-xs text-slate-600 leading-relaxed whitespace-pre-line bg-yellow-50/60 p-3.5 rounded-xl border border-yellow-200/60">
                                                        {{ $curso['objectivos'] }}
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Botão Plano Temático -->
                                        @if (!empty($curso['plano_pdf']))
                                            <a href="{{ asset('storage/' . $curso['plano_pdf']) }}" target="_blank"
                                                class="w-full inline-flex items-center justify-center gap-2 bg-[#00225a] hover:bg-blue-800 text-white font-bold text-xs py-3 px-4 rounded-xl shadow-md transition">
                                                <i data-lucide="file-down" class="w-4 h-4 text-yellow-400"></i> Descarregar Plano Temático (PDF/Doc)
                                            </a>
                                        @else
                                            <div class="text-center p-2.5 bg-slate-100 text-slate-400 rounded-xl text-xs font-medium">
                                                Plano Temático em actualização pela equipa
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-slate-400 text-sm">Nenhum curso associado até ao momento.</p>
                        @endif
                    </div>
                </div>

                <!-- ================= ABA 3: LABORATÓRIO ================= -->
                <div x-show="tab === 'laboratorio'" x-transition class="space-y-6">
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 p-6 md:p-8">
                        <h2 class="text-xl font-bold text-blue-900 border-b pb-4 mb-6 flex items-center gap-2">
                            <i data-lucide="microscope" class="w-6 h-6 text-yellow-500"></i> Laboratório Desenvolvido
                        </h2>

                        @if (!empty($projeto->laboratorio['descricao']))
                            <div class="prose max-w-none text-slate-700 leading-relaxed mb-8">
                                {!! $projeto->laboratorio['descricao'] !!}
                            </div>
                        @else
                            <div class="bg-blue-50/60 border border-blue-200 p-4 rounded-xl text-blue-900 text-xs mb-8">
                                <strong>Nota institucional:</strong> A descrição técnica, a lista de equipamentos e os recursos deste laboratório encontram-se em fase de homologação e actualização contínua pela equipa do projecto.
                            </div>
                        @endif

                        <!-- Equipamentos -->
                        @if (!empty($projeto->laboratorio['equipamentos']))
                            <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider mb-3">Equipamentos & Recursos Disponíveis</h3>
                            <div class="flex flex-wrap gap-2 mb-8">
                                @foreach ($projeto->laboratorio['equipamentos'] as $eq)
                                    <span class="inline-flex items-center gap-1.5 bg-slate-100 border border-slate-200 text-slate-800 px-3 py-1.5 rounded-lg text-xs font-medium">
                                        <i data-lucide="cpu" class="w-3.5 h-3.5 text-blue-900"></i> {{ $eq }}
                                    </span>
                                @endforeach
                            </div>
                        @endif

                        <!-- Galeria do Laboratório -->
                        @if (!empty($projeto->laboratorio['fotos']))
                            <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider mb-4">Galeria de Fotografias</h3>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                @foreach ($projeto->laboratorio['fotos'] as $foto)
                                    <a href="{{ asset('storage/' . $foto) }}" target="_blank" class="group rounded-xl overflow-hidden border border-slate-200 aspect-video block bg-slate-100">
                                        <img src="{{ asset('storage/' . $foto) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <!-- ================= ABA 4: NOTÍCIAS & ACTIVIDADES ================= -->
                <div x-show="tab === 'atividades'" x-transition class="space-y-6">
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 p-6 md:p-8">
                        <div class="border-b pb-4 mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                            <div>
                                <h2 class="text-xl font-bold text-blue-900 flex items-center gap-2">
                                    <i data-lucide="newspaper" class="w-6 h-6 text-yellow-500"></i> Notícias e Actividades do Projecto
                                </h2>
                                <p class="text-xs text-slate-500">Histórico cronológico de reuniões, testes, workshops e seminários de disseminação.</p>
                            </div>
                            <span class="text-xs bg-blue-50 text-blue-900 font-bold px-3 py-1.5 rounded-full border border-blue-200">
                                Ordem Cronológica
                            </span>
                        </div>

                        @if (!empty($projeto->atividades) && count($projeto->atividades) > 0)
                            <div class="relative border-l-2 border-slate-200 ml-4 space-y-8 pl-6 my-4">
                                @foreach ($projeto->atividades as $ativ)
                                    <div class="relative group">
                                        <!-- Bolinha de timeline -->
                                        <div class="absolute -left-[31px] top-1 w-4 h-4 rounded-full bg-yellow-500 ring-4 ring-white border border-yellow-600"></div>

                                        <div class="bg-slate-50 border border-slate-200/80 rounded-2xl p-5 hover:border-blue-400 transition">
                                            <div class="flex flex-wrap items-center gap-2 mb-2">
                                                <span class="text-xs font-mono font-bold bg-[#00225a] text-white px-2.5 py-0.5 rounded-md">
                                                    {{ $ativ['data'] ?? 'Data n/d' }}
                                                </span>
                                                @if (!empty($ativ['local']))
                                                    <span class="text-xs font-medium text-slate-500 flex items-center gap-1">
                                                        <i data-lucide="map-pin" class="w-3.5 h-3.5 text-yellow-600"></i> {{ $ativ['local'] }}
                                                    </span>
                                                @endif
                                            </div>

                                            <h3 class="text-base font-bold text-slate-900 mb-2">
                                                {{ $ativ['titulo'] ?? '' }}
                                            </h3>

                                            @if (!empty($ativ['texto']))
                                                <p class="text-xs text-slate-600 leading-relaxed mb-4">
                                                    {{ $ativ['texto'] }}
                                                </p>
                                            @endif

                                            @if (!empty($ativ['entidades']))
                                                <div class="text-[11px] text-slate-500 pt-2 border-t border-slate-200/60 flex items-center gap-1.5">
                                                    <i data-lucide="users" class="w-3.5 h-3.5 text-blue-900"></i>
                                                    Participantes: <span class="font-semibold text-slate-700">{{ $ativ['entidades'] }}</span>
                                                </div>
                                            @endif

                                            @if (!empty($ativ['fotos']))
                                                <div class="grid grid-cols-3 sm:grid-cols-4 gap-2 pt-4 mt-2">
                                                    @foreach ($ativ['fotos'] as $ft)
                                                        <a href="{{ asset('storage/' . $ft) }}" target="_blank" class="aspect-video rounded-lg overflow-hidden border border-slate-200">
                                                            <img src="{{ asset('storage/' . $ft) }}" class="w-full h-full object-cover">
                                                        </a>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-slate-400 text-xs">Nenhuma actividade registada até ao momento.</p>
                        @endif
                    </div>
                </div>

            @else
                <!-- LAYOUT CLÁSSICO PARA PROJECTOS SIMPLES -->
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 p-6 md:p-8">
                    <h2 class="text-lg font-bold text-blue-900 border-b pb-3 mb-4 flex items-center gap-2">
                        <i data-lucide="file-text" class="w-5 h-5 text-yellow-500"></i> Descrição do Projecto
                    </h2>
                    <div class="text-slate-700 text-sm leading-relaxed whitespace-pre-line">
                        {{ $projeto->descricao }}
                    </div>
                </div>
            @endif

        </div>

    </div>
</div>