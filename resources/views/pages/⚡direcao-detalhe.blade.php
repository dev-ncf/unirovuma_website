<?php
use Livewire\Component;
use App\Models\Direcao;
use Livewire\Attributes\Layout;

new #[Layout('components.layouts.app')] class extends Component {
    public $slug;
    public $membro;

    public function mount($slug) {
        $this->slug = $slug;
        $this->membro = Direcao::where('slug', $slug)->firstOrFail();
    }
};
?>

<div class="bg-slate-50 min-h-screen py-12 font-sans">
    <div class="container mx-auto px-4 max-w-5xl">
        
        <!-- Voltar -->
        <div class="mb-6">
            <a href="/" class="text-xs font-bold text-blue-900 hover:text-orange-500 transition flex items-center gap-1">
                <i data-lucide="arrow-left" class="w-4 h-4"></i> Voltar à Página Inicial
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden">
            
            <!-- Cabeçalho do Perfil -->
            <div class="bg-gradient-to-r from-[#00225a] to-blue-900 p-8 md:p-12 text-white flex flex-col md:flex-row items-center gap-8 relative overflow-hidden">
                <div class="absolute right-0 bottom-0 w-64 h-64 bg-orange-500/10 rounded-full blur-3xl pointer-events-none"></div>
                
                @if($membro->foto)
                    <div class="flex-shrink-0 relative z-10">
                        <img src="{{ asset('storage/' . $membro->foto) }}" alt="{{ $membro->nome_completo }}" class="w-40 h-40 md:w-48 md:h-48 object-cover rounded-2xl border-4 border-white/20 shadow-xl">
                    </div>
                @endif

                <div class="space-y-3 text-center md:text-left relative z-10">
                    <span class="bg-orange-500 text-white text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full inline-block">
                        {{ $membro->cargo }}
                    </span>
                    <h1 class="text-2xl md:text-4xl font-black tracking-tight">
                        {{ $membro->nome_completo }}
                    </h1>
                    
                    <div class="flex flex-wrap justify-center md:justify-start gap-4 text-xs text-blue-200 font-medium pt-2">
                        @if($membro->email)
                            <span class="flex items-center gap-1.5"><i data-lucide="mail" class="w-4 h-4 text-orange-400"></i> {{ $membro->email }}</span>
                        @endif
                        @if($membro->telefone)
                            <span class="flex items-center gap-1.5"><i data-lucide="phone" class="w-4 h-4 text-orange-400"></i> {{ $membro->telefone }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Corpo / Mensagem e Biografia -->
            <div class="p-8 md:p-12 space-y-8">
                
                @if($membro->mensagem)
                    <div class="p-6 rounded-2xl bg-orange-50/60 border border-orange-100 space-y-3">
                        <h3 class="text-sm font-black text-orange-600 uppercase tracking-wider flex items-center gap-2">
                            <i data-lucide="quote" class="w-4 h-4"></i> Mensagem Institucional
                        </h3>
                        <div class="prose max-w-none text-slate-700 text-sm leading-relaxed italic">
                            {!! $membro->mensagem !!}
                        </div>
                    </div>
                @endif

                <div class="space-y-4">
                    <h3 class="text-lg font-bold text-blue-900 border-b pb-2 flex items-center gap-2">
                        <i data-lucide="user-check" class="w-5 h-5 text-orange-500"></i> Nota Biográfica
                    </h3>
                    <div class="prose max-w-none text-slate-700 text-sm leading-relaxed space-y-4">
                        {!! $membro->biografia !!}
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

<script>
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
</script>