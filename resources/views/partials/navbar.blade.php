<header class="bg-white sticky top-0 z-[100] shadow-sm font-sans" x-data="{ mobileMenu: false, activeMenu: null }">
    <!-- Top Bar (Informações de Contato e Acesso Rápido) -->
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
                <a href="/" class="px-3 py-2 text-[#00225a] font-bold text-[11pt] hover:text-yellow-500 transition">Início</a>

                <!-- 1. Institucional (Dinâmico) -->
                <div class="relative" @mouseenter="activeMenu = 'inst'" @mouseleave="activeMenu = null">
                    <button class="px-3 py-2 text-[#00225a] font-bold text-[11pt] flex items-center gap-1">
                        Institucional <i data-lucide="chevron-down" class="w-3 h-3"></i>
                    </button>
                    <div x-show="activeMenu === 'inst'" x-cloak class="absolute left-0 top-full bg-white border border-slate-100 shadow-xl rounded-b-lg py-4 w-64">
                        @isset($menuItems['institucional'])
                            @foreach($menuItems['institucional'] as $item)
                                <a href="{{ $item->url }}" class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-yellow-500 transition">{{ $item->titulo }}</a>
                            @endforeach
                        @endisset
                    </div>
                </div>

                <!-- 2. A UniRovuma (MEGA MENU Dinâmico) -->
                <div class="relative" @mouseenter="activeMenu = 'uni'" @mouseleave="activeMenu = null">
                    <button class="px-3 py-2 text-[#00225a] font-bold text-[11pt] flex items-center gap-1">
                        A UniRovuma <i data-lucide="chevron-down" class="w-3 h-3"></i>
                    </button>
                    <div x-show="activeMenu === 'uni'" x-cloak class="absolute -left-64 top-full bg-white border shadow-2xl rounded-b-xl p-8 w-[950px] grid grid-cols-4 gap-8">
                        
                        <!-- Col 1: Ensino -->
                        <div class="space-y-3">
                            <h4 class="text-yellow-500 font-black text-[10px] border-b pb-1">Ensino</h4>
                            <ul class="text-[11pt] space-y-1.5 text-slate-600">
                                @isset($menuItems['ensino'])
                                    @foreach($menuItems['ensino'] as $item)
                                        <li><a href="{{ $item->url }}" class="hover:text-blue-900 transition">{{ $item->titulo }}</a></li>
                                    @endforeach
                                @endisset
                            </ul>
                        </div>

                        <!-- Col 2: Faculdades -->
                        <div class="space-y-3">
                            <h4 class="text-yellow-500 font-black text-[10px] border-b pb-1">Faculdades</h4>
                            <ul class="text-[11pt] space-y-1.5 text-slate-600">
                                @isset($menuItems['faculdades'])
                                    @foreach($menuItems['faculdades'] as $item)
                                        <li><a href="{{ $item->url }}" class="hover:text-blue-900 transition">{{ $item->titulo }}</a></li>
                                    @endforeach
                                @endisset
                            </ul>
                        </div>

                        <!-- Col 3: Centros de Estudo -->
                        <div class="space-y-3">
                            <h4 class="text-yellow-500 font-black text-[10px] border-b pb-1">Centros de Estudo</h4>
                            <ul class="text-[11pt] space-y-1.5 text-slate-600">
                                @isset($menuItems['centros'])
                                    @foreach($menuItems['centros'] as $item)
                                        <li><a href="{{ $item->url }}" class="hover:text-blue-900 transition">{{ $item->titulo }}</a></li>
                                    @endforeach
                                @endisset
                            </ul>
                        </div>

                        <!-- Col 4: Direcções Centrais -->
                        <div class="space-y-3">
                            <h4 class="text-yellow-500 font-black text-[10px] border-b pb-1">Direcções Centrais</h4>
                            <ul class="text-[11pt] space-y-1.5 text-slate-600">
                                @isset($menuItems['direccoes'])
                                    @foreach($menuItems['direccoes'] as $item)
                                        <li><a href="{{ $item->url }}" class="hover:text-blue-900 transition">{{ $item->titulo }}</a></li>
                                    @endforeach
                                @endisset
                            </ul>
                        </div>

                    </div>
                </div>

                <!-- 3. Institutos (Dinâmico) -->
                <div class="relative" @mouseenter="activeMenu = 'insti'" @mouseleave="activeMenu = null">
                    <button class="px-3 py-2 text-[#00225a] font-bold text-[11pt] flex items-center gap-1">
                        Institutos <i data-lucide="chevron-down" class="w-3 h-3"></i>
                    </button>
                    <div x-show="activeMenu === 'insti'" x-cloak class="absolute left-0 top-full bg-white border border-slate-100 shadow-xl rounded-b-lg py-4 w-72">
                        @isset($menuItems['institutos'])
                            @foreach($menuItems['institutos'] as $item)
                                <a href="{{ $item->url }}" class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-yellow-500 transition">{{ $item->titulo }}</a>
                            @endforeach
                        @endisset
                    </div>
                </div>

                <!-- 4. Unidades Especiais (Dinâmico) -->
                <div class="relative" @mouseenter="activeMenu = 'uni_esp'" @mouseleave="activeMenu = null">
                    <button class="px-3 py-2 text-[#00225a] font-bold text-[11pt] flex items-center gap-1">
                        Unidades Especiais <i data-lucide="chevron-down" class="w-3 h-3"></i>
                    </button>
                    <div x-show="activeMenu === 'uni_esp'" x-cloak class="absolute left-0 top-full bg-white border border-slate-100 shadow-xl rounded-b-lg py-4 w-64">
                        @isset($menuItems['unidades'])
                            @foreach($menuItems['unidades'] as $item)
                                <a href="{{ $item->url }}" class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 transition">{{ $item->titulo }}</a>
                            @endforeach
                        @endisset
                    </div>
                </div>

                <!-- 5. Pesquisa (Dinâmico) -->
                <div class="relative" @mouseenter="activeMenu = 'pesq'" @mouseleave="activeMenu = null">
                    <button class="px-3 py-2 text-[#00225a] font-bold text-[11pt] flex items-center gap-1">
                        Pesquisa <i data-lucide="chevron-down" class="w-3 h-3"></i>
                    </button>
                    <div x-show="activeMenu === 'pesq'" x-cloak class="absolute left-0 top-full bg-white border border-slate-100 shadow-xl rounded-b-lg py-4 w-56">
                        @isset($menuItems['pesquisa'])
                            @foreach($menuItems['pesquisa'] as $item)
                                <a href="{{ $item->url }}" class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 transition">{{ $item->titulo }}</a>
                            @endforeach
                        @endisset
                    </div>
                </div>

                <!-- 6. Serviços Online (Dinâmico) -->
                <div class="relative" @mouseenter="activeMenu = 'serv'" @mouseleave="activeMenu = null">
                    <button class="px-3 py-2 text-white bg-yellow-500 rounded-full font-black text-[10px] flex items-center gap-1 ml-2 hover:bg-[#00225a] transition shadow-md">
                        Serviços Online <i data-lucide="globe" class="w-3 h-3"></i>
                    </button>
                    <div x-show="activeMenu === 'serv'" x-cloak class="absolute right-0 top-full bg-white border border-slate-100 shadow-2xl rounded-b-lg py-6 w-80 grid grid-cols-1 gap-1">
                        @isset($menuItems['servicos'])
                            @foreach($menuItems['servicos'] as $item)
                                <a href="{{ $item->url }}" class="px-6 py-2 text-xs text-slate-700 hover:bg-slate-50 flex justify-between">{{ $item->titulo }}</a>
                            @endforeach
                        @endisset
                    </div>
                </div>
            </nav>

            <!-- Mobile Menu Toggle -->
            <button class="lg:hidden p-2 text-[#00225a]" @click="mobileMenu = !mobileMenu">
                <i data-lucide="menu" class="w-8 h-8"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu Canvas (Também pode iterar dinamicamente se desejar) -->
    <div x-show="mobileMenu" x-transition class="fixed inset-0 z-[200] bg-white overflow-y-auto p-6 lg:hidden">
        <div class="flex justify-between items-center mb-8 border-b pb-4">
            <img src="{{ asset('images/logotipo-unirovuma.png') }}" class="h-10">
            <span class="text-blue-900 font-black text-lg">UNIROVUMA</span>
            <button @click="mobileMenu = false" class="text-blue-900"><i data-lucide="x" class="w-6 h-6"></i></button>
        </div>
        <nav class="flex flex-col gap-2 font-black text-blue-900 text-xs tracking-wider">
            <a href="/" class="py-4 border-b flex justify-between items-center">Início <i data-lucide="home" class="w-4 h-4 text-slate-400"></i></a>
            
            <!-- Renderização dinâmica genérica para mobile baseada nos grupos criados -->
            @foreach(['institucional' => 'Institucional', 'ensino' => 'Ensino', 'faculdades' => 'Faculdades', 'centros' => 'Centros de Estudo', 'direccoes' => 'Direcções Centrais', 'institutos' => 'Institutos', 'unidades' => 'Unidades Especiais', 'pesquisa' => 'Pesquisa', 'servicos' => 'Serviços Online'] as $slug => $nomeGrupo)
                @if(isset($menuItems[$slug]))
                    <div class="border-b py-2">
                        <span class="block font-bold text-yellow-600 mb-2">{{ $nomeGrupo }}</span>
                        <div class="pl-4 space-y-2 font-normal text-slate-600">
                            @foreach($menuItems[$slug] as $item)
                                <a href="{{ $item->url }}" class="block py-1">{{ $item->titulo }}</a>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </nav>
    </div>
</header>