<?php
use Livewire\Component;
use App\Models\DireccaoCentral;
use Livewire\Attributes\Layout;

new #[Layout('components.layouts.app')]  class extends Component {
    public $slug;
    public $direccao;

    public function mount($slug) {
        $this->slug = $slug;
        $this->direccao = DireccaoCentral::where('slug', $slug)->firstOrFail();
    }
};
?>

<div class="bg-slate-50 min-h-screen py-12 font-sans">
    <div class="container mx-auto px-4 max-w-5xl">
        
        <!-- Voltar -->
        <div class="mb-6">
            <a href="/" class="text-xs font-bold text-blue-900 hover:text-yellow-500 transition flex items-center gap-1">
                <i data-lucide="arrow-left" class="w-4 h-4"></i> Voltar à Página Inicial
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden">
            
            <!-- Cabeçalho Institucional -->
            <div class="bg-gradient-to-r from-[#00225a] to-blue-900 p-8 md:p-12 text-white relative overflow-hidden">
                <div class="absolute right-0 bottom-0 w-64 h-64 bg-yellow-500/10 rounded-full blur-3xl pointer-events-none"></div>
                <div class="relative z-10 space-y-3">
                    <span class="bg-yellow-500 text-white text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full inline-block">
                        Direcção Central
                    </span>
                    <h1 class="text-2xl md:text-4xl font-black tracking-tight">
                        {{ $direccao->nome }}
                    </h1>
                    
                    <div class="flex flex-wrap gap-6 text-xs text-blue-200 font-medium pt-2">
                        @if($direccao->localizacao)
                            <span class="flex items-center gap-1.5"><i data-lucide="map-pin" class="w-4 h-4 text-yellow-400"></i> {{ $direccao->localizacao }}</span>
                        @endif
                        @if($direccao->email)
                            <span class="flex items-center gap-1.5"><i data-lucide="mail" class="w-4 h-4 text-yellow-400"></i> {{ $direccao->email }}</span>
                        @endif
                        @if($direccao->telefone)
                            <span class="flex items-center gap-1.5"><i data-lucide="phone" class="w-4 h-4 text-yellow-400"></i> {{ $direccao->telefone }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Corpo da Página -->
            <div class="p-8 md:p-12 grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Descrição e Atribuições -->
                <div class="lg:col-span-2 space-y-6">
                    <h3 class="text-lg font-bold text-blue-900 border-b pb-2 flex items-center gap-2">
                        <i data-lucide="info" class="w-5 h-5 text-yellow-500"></i> Atribuições e Serviços
                    </h3>
                    <div class="prose max-w-none text-slate-700 text-sm leading-relaxed space-y-4">
                        {!! $direccao->sobre !!}
                    </div>

                    <!-- Documentos e Minutas Úteis -->
                    @if(!empty($direccao->documentos))
                        <div class="pt-6 border-t space-y-3">
                            <h4 class="text-xs font-black text-slate-400 uppercase tracking-wider">Formulários e Minutas</h4>
                            <div class="space-y-2">
                                @foreach($direccao->documentos as $doc)
                                    <a href="{{ asset('storage/' . $doc) }}" target="_blank" class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-200 text-xs font-semibold text-blue-900 hover:bg-slate-100 transition">
                                        <span class="flex items-center gap-2"><i data-lucide="file-text" class="w-4 h-4 text-yellow-500"></i> Descarregar Documento / Minuta</span>
                                        <i data-lucide="download" class="w-4 h-4 text-slate-400"></i>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Perfil do Diretor (Sidebar) -->
                @if($direccao->diretor)
                    <div class="space-y-4 bg-slate-50 p-6 rounded-2xl border border-slate-200/80 h-fit text-center">
                        @if($direccao->diretor_foto)
                            <img src="{{ asset('storage/' . $direccao->diretor_foto) }}" alt="Diretor" class="w-28 h-28 object-cover rounded-full mx-auto border-4 border-white shadow-md">
                        @else
                            <div class="w-28 h-28 bg-blue-900 text-white rounded-full mx-auto flex items-center justify-center font-bold text-2xl shadow-md">
                                {{ substr($direccao->diretor, 0, 2) }}
                            </div>
                        @endif

                        <div>
                            <span class="text-[10px] font-bold text-yellow-600 uppercase tracking-wider">Diretor(a)</span>
                            <h4 class="font-bold text-slate-900 text-base mt-0.5">{{ $direccao->diretor }}</h4>
                        </div>

                        @if($direccao->email)
                            <div class="pt-2 border-t text-xs text-slate-600">
                                <a href="mailto:{{ $direccao->email }}" class="text-blue-900 hover:underline font-medium">{{ $direccao->email }}</a>
                            </div>
                        @endif
                    </div>
                @endif

            </div>

        </div>

    </div>
</div>

<script>
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
</script>