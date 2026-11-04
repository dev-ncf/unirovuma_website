<?php
use Livewire\Component;

use Livewire\Attributes\Layout;
use App\Models\UnidadeNoticia;

new #[Layout('components.layouts.app')] class extends Component {
    public $id;
    public $noticia;

    public function mount($id) {
        $this->id = $id;
        $this->noticia = UnidadeNoticia::with('unidade')->findOrFail($id);
    }
};
?>

<div class="bg-slate-50 min-h-screen py-10 font-sans">
    <div class="container mx-auto px-4 max-w-4xl">
        
        <!-- Voltar -->
        <div class="mb-6">
            <a href="javascript:history.back()" class="text-xs font-bold text-blue-900 hover:text-yellow-500 transition flex items-center gap-1">
                <i data-lucide="arrow-left" class="w-4 h-4"></i> Voltar à página anterior
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 p-8 md:p-12 space-y-6">
            
            <div class="space-y-2 border-b pb-6">
                <span class="bg-yellow-500 text-white text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full">
                    {{ $noticia->unidade->nome ?? 'UniRovuma' }}
                </span>
                <h1 class="text-2xl md:text-4xl font-black text-blue-900 tracking-tight mt-3">
                    {{ $noticia->titulo }}
                </h1>
                <p class="text-xs text-slate-400 font-semibold flex items-center gap-1.5 pt-2">
                    <i data-lucide="calendar" class="w-4 h-4"></i> Publicado a {{ \Carbon\Carbon::parse($noticia->data)->format('d/m/Y') }}
                </p>
            </div>

            <!-- Resumo / Descrição em Destaque -->
            <div class="p-4 rounded-xl bg-yellow-50 border border-yellow-100 text-yellow-900 text-sm font-medium leading-relaxed">
                {{ $noticia->resumo }}
            </div>

            <!-- Galeria Completa de Imagens -->
            @if(!empty($noticia->imagens))
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 py-4">
                    @foreach($noticia->imagens as $img)
                        <a href="{{ asset('storage/' . $img) }}" target="_blank" class="block overflow-hidden rounded-xl border shadow-sm group">
                            <img src="{{ asset('storage/' . $img) }}" class="w-full h-64 object-cover group-hover:scale-105 transition duration-300">
                        </a>
                    @endforeach
                </div>
            @endif

        </div>

    </div>
</div>

<!-- Reativar Lucide Icons no Livewire -->
<script>
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
</script>