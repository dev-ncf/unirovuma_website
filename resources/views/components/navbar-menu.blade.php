<?php
use Livewire\Component;
use App\Models\MenuItem;

new class extends Component {
    public function render() {
        return view('components.navbar-menu', [
            'menuItems' => MenuItem::orderBy('ordem')->get()->groupBy('grupo')
        ]);
    }
};
?>

<header class="bg-white sticky top-0 z-[100] shadow-sm font-sans" x-data="{ mobileMenu: false, activeMenu: null }">
    <!-- Top Bar -->
    <div class="bg-[#00225a] text-white py-2 px-4 hidden lg:block">
        <div class="container mx-auto flex justify-between items-center text-[10px] font-bold tracking-widest">
            <div class="flex gap-6">
                <span class="flex items-center gap-1.5"><i data-lucide="phone" class="w-3 h-3 text-yellow-400"></i> (+258) 840731777</span>
                <span class="flex items-center gap-1.5 lowercase font-medium"><i data-lucide="mail" class="w-3 h-3 text-yellow-400"></i> secretariageral@unirovuma.ac.mz</span>
            </div>
            <div class="flex gap-4">
                <a href="https://web.facebook.com/UniRovuma" target="_blank" class="hover:text-yellow-400 transition"><i data-lucide="facebook" class="w-3.5 h-3.5"></i></a>
                <a href="https://www.youtube.com/c/UniversidadeRovuma" target="_blank" class="hover:text-yellow-400 transition"><i data-lucide="youtube" class="w-3.5 h-3.5"></i></a>
                <span class="border-l border-blue-800 ml-2 pl-4 flex gap-4">
                    <a href="https://sigeur.unirovuma.ac.mz/" class="hover:text-yellow-400 transition">SIGEUR</a>
                    <a href="https://sigim.unirovuma.ac.mz/" class="hover:text-yellow-400 transition">SIGIM</a>
                </span>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <div class="container mx-auto px-4 py-3">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="flex items-center gap-2 text-blue-900 font-black">
                <img src="{{ asset('images/logotipo-unirovuma.png') }}" alt="UniRovuma" class="h-14 lg:h-16">
                <div class="flex flex-col">
                    <span>UNIVERSIDADE</span>
                    <span class="flex items-center gap-2 text-yellow-500">ROVUMA</span>
                </div>
            </a>

            <!-- Desktop Menu -->
            <nav class="hidden lg:flex items-center gap-1">
                <a href="/" class="px-3 py-2 text-[#00225a] font-bold text-[11pt] hover:text-yellow-500 transition rounded-lg">Início</a>

                <!-- 1. Institucional (2 Colunas Uniformizadas) -->
                <div class="relative" @mouseenter="activeMenu = 'inst'" @mouseleave="activeMenu = null">
                    <button class="px-3 py-2 text-[#00225a] font-bold text-[11pt] flex items-center gap-1 hover:text-yellow-500 transition rounded-lg">
                        Institucional <i data-lucide="chevron-down" class="w-3 h-3"></i>
                    </button>
                    <div x-show="activeMenu === 'inst'" x-cloak class="absolute left-0 top-full bg-white border border-slate-100 shadow-2xl rounded-xl p-6 w-[520px] grid grid-cols-2 gap-6">
                        @isset($menuItems['institucional'])
                            @php
                                $reitoria = $menuItems['institucional']->reject(fn($item) => str_contains(strtolower($item->titulo), 'vice-reitor'));
                                $viceReitores = $menuItems['institucional']->filter(fn($item) => str_contains(strtolower($item->titulo), 'vice-reitor'));
                            @endphp

                            <!-- Coluna 1: Reitoria -->
                            <div class="space-y-2">
                                <h4 class="text-yellow-500 font-black text-[10px] border-b pb-1 uppercase tracking-wider">Reitoria</h4>
                                <ul class="space-y-1 text-slate-600">
                                    @foreach($reitoria as $item)
                                        <li>
                                            <a href="{{ $item->url }}" class="block px-3 py-2 text-xs rounded-lg hover:bg-slate-50 hover:text-yellow-500 transition font-medium">
                                                {{ $item->titulo }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Coluna 2: Vice-Reitores -->
                            <div class="space-y-2">
                                <h4 class="text-yellow-500 font-black text-[10px] border-b pb-1 uppercase tracking-wider">Vice-Reitores</h4>
                                <ul class="space-y-1 text-slate-600">
                                    @foreach($viceReitores as $item)
                                        <li>
                                            <a href="{{ $item->url }}" class="block px-3 py-2 text-xs rounded-lg hover:bg-slate-50 hover:text-yellow-500 transition font-medium">
                                                {{ $item->titulo }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endisset
                    </div>
                </div>

                <!-- 2. A UniRovuma (MEGA MENU Uniformizado) -->
                <div class="relative" @mouseenter="activeMenu = 'uni'" @mouseleave="activeMenu = null">
                    <button class="px-3 py-2 text-[#00225a] font-bold text-[11pt] flex items-center gap-1 hover:text-yellow-500 transition rounded-lg">
                        A UniRovuma <i data-lucide="chevron-down" class="w-3 h-3"></i>
                    </button>
                    <div x-show="activeMenu === 'uni'" x-cloak class="absolute -left-64 top-full bg-white border shadow-2xl rounded-2xl p-8 w-[950px] grid grid-cols-4 gap-8">
                        
                        <!-- Col 1: Ensino -->
                        <div class="space-y-3">
                            <h4 class="text-yellow-500 font-black text-[10px] border-b pb-1 uppercase tracking-wider">Ensino</h4>
                            <ul class="text-xs space-y-1 text-slate-600">
                                @isset($menuItems['ensino'])
                                    @foreach($menuItems['ensino'] as $item)
                                        <li><a href="{{ $item->url }}" class="block px-2.5 py-1.5 rounded-lg hover:bg-slate-50 hover:text-yellow-500 transition font-medium">{{ $item->titulo }}</a></li>
                                    @endforeach
                                @endisset
                            </ul>
                        </div>

                        <!-- Col 2: Faculdades -->
                        <div class="space-y-3">
                            <h4 class="text-yellow-500 font-black text-[10px] border-b pb-1 uppercase tracking-wider">Faculdades</h4>
                            <ul class="text-xs space-y-1 text-slate-600">
                                @isset($menuItems['faculdades'])
                                    @foreach($menuItems['faculdades'] as $item)
                                        <li><a href="{{ $item->url }}" class="block px-2.5 py-1.5 rounded-lg hover:bg-slate-50 hover:text-yellow-500 transition font-medium">{{ $item->titulo }}</a></li>
                                    @endforeach
                                @endisset
                            </ul>
                        </div>

                        <!-- Col 3: Centros de Estudo -->
                        <div class="space-y-3">
                            <h4 class="text-yellow-500 font-black text-[10px] border-b pb-1 uppercase tracking-wider">Centros de Estudo</h4>
                            <ul class="text-xs space-y-1 text-slate-600">
                                @isset($menuItems['centros'])
                                    @foreach($menuItems['centros'] as $item)
                                        <li><a href="{{ $item->url }}" class="block px-2.5 py-1.5 rounded-lg hover:bg-slate-50 hover:text-yellow-500 transition font-medium">{{ $item->titulo }}</a></li>
                                    @endforeach
                                @endisset
                            </ul>
                        </div>

                        <!-- Col 4: Direcções Centrais -->
                        <div class="space-y-3">
                            <h4 class="text-yellow-500 font-black text-[10px] border-b pb-1 uppercase tracking-wider">Direcções Centrais</h4>
                            <ul class="text-xs space-y-1 text-slate-600">
                                @isset($menuItems['direccoes'])
                                    @foreach($menuItems['direccoes'] as $item)
                                        <li><a href="{{ $item->url }}" class="block px-2.5 py-1.5 rounded-lg hover:bg-slate-50 hover:text-yellow-500 transition font-medium">{{ $item->titulo }}</a></li>
                                    @endforeach
                                @endisset
                            </ul>
                        </div>

                    </div>
                </div>

                <!-- 3. Institutos -->
                <div class="relative" @mouseenter="activeMenu = 'insti'" @mouseleave="activeMenu = null">
                    <button class="px-3 py-2 text-[#00225a] font-bold text-[11pt] flex items-center gap-1 hover:text-yellow-500 transition rounded-lg">
                        Institutos <i data-lucide="chevron-down" class="w-3 h-3"></i>
                    </button>
                    <div x-show="activeMenu === 'insti'" x-cloak class="absolute left-0 top-full bg-white border border-slate-100 shadow-2xl rounded-xl p-4 w-72">
                        <ul class="space-y-1 text-slate-600">
                            @isset($menuItems['institutos'])
                                @foreach($menuItems['institutos'] as $item)
                                    <li><a href="{{ $item->url }}" class="block px-3 py-2 text-xs rounded-lg hover:bg-slate-50 hover:text-yellow-500 transition font-medium">{{ $item->titulo }}</a></li>
                                @endforeach
                            @endisset
                        </ul>
                    </div>
                </div>

                <!-- 4. Unidades Especiais -->
                <div class="relative" @mouseenter="activeMenu = 'uni_esp'" @mouseleave="activeMenu = null">
                    <button class="px-3 py-2 text-[#00225a] font-bold text-[11pt] flex items-center gap-1 hover:text-yellow-500 transition rounded-lg">
                        Unidades Especiais <i data-lucide="chevron-down" class="w-3 h-3"></i>
                    </button>
                    <div x-show="activeMenu === 'uni_esp'" x-cloak class="absolute left-0 top-full bg-white border border-slate-100 shadow-2xl rounded-xl p-4 w-72">
                        <ul class="space-y-1 text-slate-600">
                            @isset($menuItems['unidades'])
                                @foreach($menuItems['unidades'] as $item)
                                    <li><a href="{{ $item->url }}" class="block px-3 py-2 text-xs rounded-lg hover:bg-slate-50 hover:text-yellow-500 transition font-medium">{{ $item->titulo }}</a></li>
                                @endforeach
                            @endisset
                        </ul>
                    </div>
                </div>

                <!-- 5. Pesquisa -->
                <div class="relative" @mouseenter="activeMenu = 'pesq'" @mouseleave="activeMenu = null">
                    <button class="px-3 py-2 text-[#00225a] font-bold text-[11pt] flex items-center gap-1 hover:text-yellow-500 transition rounded-lg">
                        Pesquisa <i data-lucide="chevron-down" class="w-3 h-3"></i>
                    </button>
                    <div x-show="activeMenu === 'pesq'" x-cloak class="absolute left-0 top-full bg-white border border-slate-100 shadow-2xl rounded-xl p-4 w-60">
                        <ul class="space-y-1 text-slate-600">
                            @isset($menuItems['pesquisa'])
                                @foreach($menuItems['pesquisa'] as $item)
                                    <li><a href="{{ $item->url }}" class="block px-3 py-2 text-xs rounded-lg hover:bg-slate-50 hover:text-yellow-500 transition font-medium">{{ $item->titulo }}</a></li>
                                @endforeach
                            @endisset
                        </ul>
                    </div>
                </div>

                <!-- 6. Serviços Online -->
                <div class="relative" @mouseenter="activeMenu = 'serv'" @mouseleave="activeMenu = null">
                    <button class="px-4 py-2 text-white bg-yellow-500 rounded-full font-black text-[10px] flex items-center gap-1.5 ml-2 hover:bg-[#00225a] transition shadow-md">
                        Serviços Online <i data-lucide="globe" class="w-3 h-3"></i>
                    </button>
                    <div x-show="activeMenu === 'serv'" x-cloak class="absolute right-0 top-full bg-white border border-slate-100 shadow-2xl rounded-2xl p-4 w-72">
                        <ul class="space-y-1 text-slate-700">
                            @isset($menuItems['servicos'])
                                @foreach($menuItems['servicos'] as $item)
                                    <li><a href="{{ $item->url }}" class="block px-3 py-2 text-xs rounded-lg hover:bg-slate-50 hover:text-yellow-500 transition font-medium flex justify-between items-center">{{ $item->titulo }} <i data-lucide="external-link" class="w-3 h-3 opacity-40"></i></a></li>
                                @endforeach
                            @endisset
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Mobile Menu Toggle -->
            <button class="lg:hidden p-2 text-[#00225a]" @click="mobileMenu = !mobileMenu">
                <i data-lucide="menu" class="w-8 h-8"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu Canvas -->
    <div x-show="mobileMenu" x-transition class="fixed inset-0 z-[200] bg-white overflow-y-auto p-6 lg:hidden">
        <div class="flex justify-between items-center mb-8 border-b pb-4">
            <img src="{{ asset('images/logotipo-unirovuma.png') }}" class="h-10">
            <span class="text-blue-900 font-black text-lg">UNIROVUMA</span>
            <button @click="mobileMenu = false" class="text-blue-900"><i data-lucide="x" class="w-6 h-6"></i></button>
        </div>
        <nav class="flex flex-col gap-2 font-black text-blue-900 text-xs tracking-wider">
            <a href="/" class="py-4 border-b flex justify-between items-center">Início <i data-lucide="home" class="w-4 h-4 text-slate-400"></i></a>
            
            @foreach(['institucional' => 'Institucional', 'ensino' => 'Ensino', 'faculdades' => 'Faculdades', 'centros' => 'Centros de Estudo', 'direccoes' => 'Direcções Centrais', 'institutos' => 'Institutos', 'unidades' => 'Unidades Especiais', 'pesquisa' => 'Pesquisa', 'servicos' => 'Serviços Online'] as $slug => $nomeGrupo)
                @if(isset($menuItems[$slug]))
                    <div class="border-b py-2">
                        <span class="block font-bold text-yellow-600 mb-2">{{ $nomeGrupo }}</span>
                        <div class="pl-4 space-y-1 font-normal text-slate-600 text-xs">
                            @foreach($menuItems[$slug] as $item)
                                <a href="{{ $item->url }}" class="block py-1.5 px-2 rounded-lg hover:bg-slate-50 hover:text-yellow-500 transition">{{ $item->titulo }}</a>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </nav>
    </div>
</header>