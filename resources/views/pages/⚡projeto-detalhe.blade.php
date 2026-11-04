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

        // Suporta tanto o Model 'Projeto' como 'Projecto'
        $modelClass = class_exists(\App\Models\UnidadeProjeto::class) 
            ? \App\Models\UnidadeProjeto::class 
            : \App\Models\UnidadeProjeto::class;

        $this->projeto = $modelClass::findOrFail($id);

        // Tenta obter a unidade académica associada para o botão voltar
        if (method_exists($this->projeto, 'unidadeAcademica') && $this->projeto->unidadeAcademica) {
            $this->unidade = $this->projeto->unidadeAcademica;
        } elseif (method_exists($this->projeto, 'unidade') && $this->projeto->unidade) {
            $this->unidade = $this->projeto->unidade;
        } elseif (!empty($this->projeto->unidade_academica_id)) {
            $this->unidade = \App\Models\UnidadeAcademica::find($this->projeto->unidade_academica_id);
        }
    }

    public function getAnexosAgrupadosProperty()
    {
        if (empty($this->projeto->anexos)) {
            return [];
        }

        $anexos = is_string($this->projeto->anexos) 
            ? json_decode($this->projeto->anexos, true) 
            : $this->projeto->anexos;

        if (!is_array($anexos)) {
            return [];
        }

        $grupos = [
            'imagens'    => [],
            'documentos' => [],
            'planilhas'  => [],
            'outros'     => [],
        ];

        foreach ($anexos as $anexo) {
            $ext = strtolower(pathinfo($anexo, PATHINFO_EXTENSION));
            $nome = basename($anexo);
            $dados = [
                'caminho'  => $anexo,
                'nome'     => $nome,
                'extensao' => $ext ?: 'DOC',
                'url'      => asset('storage/' . $anexo),
            ];

            if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif', 'svg'])) {
                $grupos['imagens'][] = $dados;
            } elseif (in_array($ext, ['pdf', 'doc', 'docx', 'odt', 'txt', 'rtf'])) {
                $grupos['documentos'][] = $dados;
            } elseif (in_array($ext, ['xls', 'xlsx', 'csv', 'ods'])) {
                $grupos['planilhas'][] = $dados;
            } else {
                $grupos['outros'][] = $dados;
            }
        }

        return $grupos;
    }
};
?>

<div class="bg-slate-50 min-h-screen py-10 font-sans">
    <div class="container mx-auto px-4 max-w-5xl">

        <!-- Voltar / Breadcrumbs -->
        <div class="mb-6 flex items-center justify-between">
            @if ($unidade)
                <a href="{{ url('/unidade/' . $unidade->slug) }}"
                    class="text-xs font-bold text-blue-900 hover:text-yellow-500 transition flex items-center gap-1.5">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i> Voltar para {{ $unidade->nome }}
                </a>
            @else
                <a href="javascript:history.back()"
                    class="text-xs font-bold text-blue-900 hover:text-yellow-500 transition flex items-center gap-1.5">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i> Voltar à Página Anterior
                </a>
            @endif

            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">
                UniRovuma &bull; Projectos
            </span>
        </div>

        <!-- Cabeçalho do Projecto -->
        <div class="bg-gradient-to-r from-[#00225a] to-blue-900 rounded-3xl shadow-xl text-white p-8 md:p-12 mb-8 relative overflow-hidden">
            <div class="absolute right-0 bottom-0 w-72 h-72 bg-yellow-500/10 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10 space-y-4 max-w-3xl">
                <span class="inline-block bg-yellow-500 text-white text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full">
                    Projecto de Inovação
                </span>

                <h1 class="text-2xl md:text-4xl font-black tracking-tight leading-tight">
                    {{ $projeto->titulo }}
                </h1>

                @if ($unidade)
                    <p class="text-xs text-blue-200 font-medium flex items-center gap-2 pt-1">
                        <i data-lucide="building-2" class="w-4 h-4 text-yellow-400"></i>
                        Unidade: <span class="text-white font-bold">{{ $unidade->nome }}</span>
                    </p>
                @endif
            </div>
        </div>

        <!-- Conteúdo Principal -->
        <div class="space-y-8">

            <!-- Descrição Completa -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 p-6 md:p-8">
                <h2 class="text-lg font-bold text-blue-900 border-b pb-3 mb-4 flex items-center gap-2">
                    <i data-lucide="file-text" class="w-5 h-5 text-yellow-500"></i> Descrição do Projecto
                </h2>
                <div class="text-slate-700 text-sm leading-relaxed whitespace-pre-line">
                    {{ $projeto->descricao }}
                </div>
            </div>

            <!-- ANEXOS E FICHEIROS -->
            @php $grupos = $this->anexosAgrupados; @endphp

            @if (!empty($grupos) && (count($grupos['imagens']) || count($grupos['documentos']) || count($grupos['planilhas']) || count($grupos['outros'])))

                <!-- 1. IMAGENS (ABERTAS EM DESTAQUE) -->
                @if (count($grupos['imagens']) > 0)
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 p-6 md:p-8">
                        <h2 class="text-lg font-bold text-blue-900 border-b pb-3 mb-6 flex items-center gap-2">
                            <i data-lucide="image" class="w-5 h-5 text-yellow-500"></i> 
                            Galeria de Imagens do Projecto 
                            <span class="text-xs bg-yellow-100 text-yellow-700 font-bold px-2.5 py-0.5 rounded-full ml-2">
                                {{ count($grupos['imagens']) }} foto(s)
                            </span>
                        </h2>

                        <!-- Grid com as imagens já abertas/visíveis -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
                            @foreach ($grupos['imagens'] as $img)
                                <div class="group relative rounded-2xl overflow-hidden border border-slate-200 bg-slate-100 shadow-sm flex flex-col">
                                    <div class="aspect-video w-full overflow-hidden bg-slate-200">
                                        <img src="{{ $img['url'] }}" alt="{{ $img['nome'] }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                                    </div>
                                    <div class="p-3 bg-white flex items-center justify-between gap-2 border-t border-slate-100">
                                        
                                        <a href="{{ $img['url'] }}" target="_blank"
                                            class="inline-flex items-center gap-1 text-[11px] font-bold text-yellow-600 hover:text-yellow-700 flex-shrink-0">
                                            Ampliar <i data-lucide="external-link" class="w-3 h-3"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- 2. DOCUMENTOS E PDFs -->
                @if (count($grupos['documentos']) > 0)
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 p-6 md:p-8">
                        <h2 class="text-lg font-bold text-blue-900 border-b pb-3 mb-6 flex items-center gap-2">
                            <i data-lucide="file-check" class="w-5 h-5 text-blue-600"></i> Documentos & Publicações
                            <span class="text-xs bg-blue-100 text-blue-800 font-bold px-2.5 py-0.5 rounded-full ml-2">
                                {{ count($grupos['documentos']) }}
                            </span>
                        </h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            @foreach ($grupos['documentos'] as $doc)
                                <a href="{{ $doc['url'] }}" target="_blank"
                                    class="flex items-center justify-between p-4 rounded-xl bg-slate-50 border border-slate-200 hover:border-blue-500 hover:bg-blue-50/40 transition">
                                    <div class="flex items-center gap-3 overflow-hidden">
                                        <div class="w-10 h-10 rounded-xl bg-red-100 text-red-600 flex items-center justify-center font-black text-xs uppercase flex-shrink-0">
                                            {{ $doc['extensao'] }}
                                        </div>
                                        <div class="overflow-hidden">
                                            <p class="text-xs font-bold text-slate-800 truncate">{{ $doc['nome'] }}</p>
                                            <span class="text-[10px] text-slate-400 uppercase font-semibold">Documento para download</span>
                                        </div>
                                    </div>
                                    <i data-lucide="download" class="w-4 h-4 text-slate-400 hover:text-blue-600 flex-shrink-0 ml-2"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- 3. PLANILHAS DE DADOS -->
                @if (count($grupos['planilhas']) > 0)
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 p-6 md:p-8">
                        <h2 class="text-lg font-bold text-blue-900 border-b pb-3 mb-6 flex items-center gap-2">
                            <i data-lucide="sheet" class="w-5 h-5 text-emerald-600"></i> Tabelas e Folhas de Cálculo
                            <span class="text-xs bg-emerald-100 text-emerald-800 font-bold px-2.5 py-0.5 rounded-full ml-2">
                                {{ count($grupos['planilhas']) }}
                            </span>
                        </h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            @foreach ($grupos['planilhas'] as $planilha)
                                <a href="{{ $planilha['url'] }}" target="_blank"
                                    class="flex items-center justify-between p-4 rounded-xl bg-slate-50 border border-slate-200 hover:border-emerald-500 hover:bg-emerald-50/40 transition">
                                    <div class="flex items-center gap-3 overflow-hidden">
                                        <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-black text-xs uppercase flex-shrink-0">
                                            {{ $planilha['extensao'] }}
                                        </div>
                                        <div class="overflow-hidden">
                                            <p class="text-xs font-bold text-slate-800 truncate">{{ $planilha['nome'] }}</p>
                                            <span class="text-[10px] text-slate-400 uppercase font-semibold">Ficheiro de dados</span>
                                        </div>
                                    </div>
                                    <i data-lucide="download" class="w-4 h-4 text-slate-400 hover:text-emerald-600 flex-shrink-0 ml-2"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- 4. OUTROS ANEXOS -->
                @if (count($grupos['outros']) > 0)
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 p-6 md:p-8">
                        <h2 class="text-lg font-bold text-blue-900 border-b pb-3 mb-6 flex items-center gap-2">
                            <i data-lucide="paperclip" class="w-5 h-5 text-slate-500"></i> Outros Ficheiros
                        </h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            @foreach ($grupos['outros'] as $outro)
                                <a href="{{ $outro['url'] }}" target="_blank"
                                    class="flex items-center justify-between p-4 rounded-xl bg-slate-50 border border-slate-200 hover:border-yellow-500 transition">
                                    <div class="flex items-center gap-3 overflow-hidden">
                                        <div class="w-10 h-10 rounded-xl bg-slate-200 text-slate-700 flex items-center justify-center font-black text-xs uppercase flex-shrink-0">
                                            {{ $outro['extensao'] }}
                                        </div>
                                        <p class="text-xs font-bold text-slate-800 truncate">{{ $outro['nome'] }}</p>
                                    </div>
                                    <i data-lucide="download" class="w-4 h-4 text-slate-400 flex-shrink-0 ml-2"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

            @else
                <div class="bg-white rounded-2xl shadow-sm border border-dashed border-slate-200 p-8 text-center text-slate-400 text-xs">
                    Nenhum anexo disponível para este projecto.
                </div>
            @endif

        </div>

    </div>
</div>