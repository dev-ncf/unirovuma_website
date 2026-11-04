<?php
use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\UnidadeAcademica;

new #[Layout('components.layouts.app')] class extends Component {
    public $slug;
    public $unidade;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->unidade = UnidadeAcademica::with(['cursos', 'noticias', 'projetos'])
            ->where('slug', $slug)
            ->firstOrFail();
    }
};
?>

<div class="bg-slate-50 min-h-screen py-10 font-sans" x-data="{
    modalAberto: false,
    projetoAtivo: null,
    abrirModal(proj) {
        this.projetoAtivo = proj;
        this.modalAberto = true;
        this.$nextTick(() => {
            if (window.lucide) {
                window.lucide.createIcons();
            }
        });
    },
    fecharModal() {
        this.modalAberto = false;
        this.projetoAtivo = null;
    },
    get imagens() {
        return (this.projetoAtivo?.anexos || []).filter(a => a.is_imagem);
    },
    get documentos() {
        return (this.projetoAtivo?.anexos || []).filter(a => a.is_doc);
    },
    get planilhas() {
        return (this.projetoAtivo?.anexos || []).filter(a => a.is_planilha);
    },
    get outros() {
        return (this.projetoAtivo?.anexos || []).filter(a => !a.is_imagem && !a.is_doc && !a.is_planilha);
    }
}" @keydown.escape.window="fecharModal()">

    <div class="container mx-auto px-4 max-w-6xl">

        <!-- Breadcrumb / Voltar -->
        <div class="mb-6">
            <a href="/"
                class="text-xs font-bold text-blue-900 hover:text-orange-500 transition flex items-center gap-1">
                <i data-lucide="arrow-left" class="w-4 h-4"></i> Voltar à Página Inicial
            </a>
        </div>

        <!-- Cabeçalho Institucional da Unidade -->
        <div
            class="bg-gradient-to-r from-[#00225a] to-blue-900 rounded-2xl shadow-xl text-white p-8 md:p-12 mb-8 relative overflow-hidden">
            <div class="absolute right-0 bottom-0 w-80 h-80 bg-orange-500/10 rounded-full blur-3xl pointer-events-none">
            </div>
            <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">

                <div class="space-y-3">
                    <span
                        class="bg-orange-500 text-white text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full">
                        {{ ucfirst($unidade->tipo) }} da UniRovuma
                    </span>
                    <h1 class="text-3xl md:text-5xl font-black tracking-tight">
                        {{ $unidade->nome }}
                    </h1>

                    <div class="flex flex-wrap gap-6 text-xs text-blue-200 font-medium pt-2">
                        @if ($unidade->diretor)
                            <span class="flex items-center gap-1.5"><i data-lucide="user"
                                    class="w-4 h-4 text-orange-400"></i> Diretor: {{ $unidade->diretor }}</span>
                        @endif
                        @if ($unidade->email)
                            <span class="flex items-center gap-1.5"><i data-lucide="mail"
                                    class="w-4 h-4 text-orange-400"></i> {{ $unidade->email }}</span>
                        @endif
                        @if ($unidade->telefone)
                            <span class="flex items-center gap-1.5"><i data-lucide="phone"
                                    class="w-4 h-4 text-orange-400"></i> {{ $unidade->telefone }}</span>
                        @endif
                    </div>
                </div>

                @if ($unidade->diretor_foto)
                    <div class="flex-shrink-0">
                        <img src="{{ asset('storage/' . $unidade->diretor_foto) }}" alt="Diretor"
                            class="w-32 h-32 md:w-40 md:h-40 object-cover rounded-2xl border-4 border-white/20 shadow-lg">
                    </div>
                @endif

            </div>
        </div>

        <!-- Layout em Grelha -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Coluna Esquerda: Sobre e Cursos -->
            <div class="lg:col-span-2 space-y-8">

                @if ($unidade->sobre)
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 p-8">
                        <h2 class="text-xl font-bold text-blue-900 border-b pb-3 mb-4 flex items-center gap-2">
                            <i data-lucide="info" class="w-5 h-5 text-orange-500"></i> Sobre a Unidade
                        </h2>
                        <div class="prose max-w-none text-slate-700 text-sm leading-relaxed space-y-3">
                            {!! $unidade->sobre !!}
                        </div>
                    </div>
                @endif

                <!-- Bloco de Cursos -->
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 p-8">
                    <h2 class="text-xl font-bold text-blue-900 border-b pb-3 mb-6 flex items-center gap-2">
                        <i data-lucide="graduation-cap" class="w-5 h-5 text-orange-500"></i> Cursos Ministrados
                    </h2>

                    @if ($unidade->cursos->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach ($unidade->cursos as $curso)
                                <div
                                    class="p-4 rounded-xl bg-slate-50 border border-slate-200/60 hover:border-orange-400 transition">
                                    <span
                                        class="text-[10px] font-bold text-orange-600 bg-orange-50 px-2.5 py-0.5 rounded-full border border-orange-200">
                                        {{ $curso->grau }}
                                    </span>
                                    <h3 class="font-bold text-slate-900 text-sm mt-2">{{ $curso->nome }}</h3>
                                    <p class="text-xs text-slate-500 mt-1">Regime: {{ $curso->regime }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-xs text-slate-400 italic">Nenhum curso associado no momento.</p>
                    @endif
                </div>

                <!-- Notícias Dinâmicas -->
                @if ($unidade->noticias->count() > 0)
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 p-8">
                        <h2 class="text-xl font-bold text-blue-900 border-b pb-3 mb-6 flex items-center gap-2">
                            <i data-lucide="newspaper" class="w-5 h-5 text-orange-500"></i> Notícias e Destaques
                        </h2>
                        <div class="space-y-6">
                            @foreach ($unidade->noticias as $noticia)
                                <div
                                    class="p-6 rounded-xl bg-slate-50 border border-slate-200/60 hover:border-orange-400 transition flex flex-col sm:flex-row gap-5 items-start">

                                    @if (!empty($noticia->imagens) && count($noticia->imagens) > 0)
                                        <div class="w-full sm:w-48 h-32 flex-shrink-0">
                                            <a href="{{ route('noticia.detalhe', $noticia->id) }}">
                                                <img src="{{ asset('storage/' . $noticia->imagens[0]) }}"
                                                    alt="{{ $noticia->titulo }}"
                                                    class="w-full h-full object-cover rounded-xl border shadow-sm hover:opacity-95 transition">
                                            </a>
                                        </div>
                                    @endif

                                    <div class="space-y-2 flex-grow">
                                        <span class="text-[10px] text-slate-400 font-bold flex items-center gap-1">
                                            <i data-lucide="calendar" class="w-3 h-3"></i>
                                            {{ \Carbon\Carbon::parse($noticia->data)->format('d/m/Y') }}
                                        </span>

                                        <h3 class="font-bold text-slate-900 text-base hover:text-orange-500 transition">
                                            <a href="{{ route('noticia.detalhe', $noticia->id) }}">
                                                {{ $noticia->titulo }}
                                            </a>
                                        </h3>

                                        <p class="text-xs text-slate-600 leading-relaxed">
                                            {{ $noticia->resumo }}
                                        </p>

                                        <div class="pt-2">
                                            <a href="{{ route('noticia.detalhe', $noticia->id) }}"
                                                class="inline-flex items-center gap-1 text-xs font-bold text-orange-600 hover:text-orange-700 transition">
                                                Ler artigo completo <i data-lucide="arrow-right"
                                                    class="w-3.5 h-3.5"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- Coluna Direita: Projetos e Anexos -->
            <div class="space-y-8">

                <!-- Coluna Direita: Projectos e Anexos -->
                @if ($unidade->projetos->count() > 0)
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 p-6">
                        <h2 class="text-lg font-bold text-blue-900 border-b pb-3 mb-4 flex items-center gap-2">
                            <i data-lucide="briefcase" class="w-5 h-5 text-orange-500"></i> Projectos Ativos
                        </h2>
                        <div class="space-y-4">
                            @foreach ($unidade->projetos as $projeto)
                                <div
                                    class="p-4 rounded-xl bg-slate-50 border border-slate-200/60 space-y-3 hover:border-orange-400 transition">
                                    <div>
                                        <h3 class="font-bold text-slate-900 text-sm">{{ $projeto->titulo }}</h3>
                                        <p class="text-xs text-slate-600 leading-relaxed mt-1 line-clamp-2">
                                            {{ $projeto->descricao }}
                                        </p>
                                    </div>

                                    <!-- Botão de Redirecionamento Direto -->
                                    <div class="pt-2 border-t border-slate-200/60 flex items-center justify-between">
                                        <span class="text-[10px] text-slate-400 font-medium">
                                            {{ !empty($projeto->anexos) ? count($projeto->anexos) . ' anexo(s)' : 'Sem anexos' }}
                                        </span>

                                        <a href="{{ route('projeto.detalhe', $projeto->id) }}"
                                            class="inline-flex items-center gap-1.5 text-xs font-bold text-blue-900 hover:text-orange-600 transition bg-white px-3 py-1.5 rounded-lg border border-slate-200 shadow-sm">
                                            <i data-lucide="eye" class="w-3.5 h-3.5 text-orange-500"></i>
                                            Mais Detalhes
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Caixa de Ajuda -->
                <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl shadow-lg text-white p-6">
                    <h3 class="font-bold text-base mb-2">Precisa de suporte?</h3>
                    <p class="text-xs text-orange-100 leading-relaxed mb-4">Entre em contacto direto com os serviços
                        académicos desta unidade ou dirija-se ao campus.</p>
                    <a href="mailto:{{ $unidade->email ?? 'secretariageral@unirovuma.ac.mz' }}"
                        class="block text-center bg-white text-orange-600 font-bold text-xs py-2.5 rounded-xl shadow transition hover:bg-orange-50">
                        Enviar Email
                    </a>
                </div>

            </div>

        </div>

    </div>



</div>
