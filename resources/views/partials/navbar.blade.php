<header class="bg-white sticky top-0 z-[100] shadow-sm font-sans" x-data="{ mobileMenu: false, activeMenu: null }">
    <!-- Top Bar (Informações de Contato e Acesso Rápido) -->
    <div class="bg-[#00225a] text-white py-2 px-4 hidden lg:block">
        <div class="container mx-auto flex justify-between items-center text-[10px] uppercase font-bold tracking-widest">
            <div class="flex gap-6">
                <span class="flex items-center gap-1.5"><i data-lucide="phone" class="w-3 h-3 text-orange-400"></i> (+258) 840731777</span>
                <span class="flex items-center gap-1.5 lowercase font-medium"><i data-lucide="mail" class="w-3 h-3 text-orange-400"></i> secretariageral@unirovuma.ac.mz</span>
            </div>
            <div class="flex gap-4">
                <a href="https://web.facebook.com/UniRovuma" target="_blank" class="hover:text-orange-400 transition"><i data-lucide="facebook" class="w-3.5 h-3.5"></i></a>
                <a href="https://www.youtube.com/c/UniversidadeRovuma" target="_blank" class="hover:text-orange-400 transition"><i data-lucide="youtube" class="w-3.5 h-3.5"></i></a>
                <span class="border-l border-blue-800 ml-2 pl-4 flex gap-4">
                    <a href="https://sigeur.unirovuma.ac.mz/" class="hover:text-orange-400 transition">SIGEUR</a>
                    <a href="https://sigim.unirovuma.ac.mz/" class="hover:text-orange-400 transition">SIGIM</a>
                </span>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <div class="container mx-auto px-4 py-3">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="flex-shrink-0">
                <img src="{{ asset('images/logotipo-unirovuma.png') }}" alt="UniRovuma" class="h-14 lg:h-16">
            </a>

            <!-- Desktop Menu -->
            <nav class="hidden lg:flex items-center gap-1">
                <a href="/" class="px-3 py-2 text-[#00225a] font-bold uppercase text-[11px] hover:text-orange-500 transition">Início</a>

                <!-- 1. Institucional Dropdown -->
                <div class="relative" @mouseenter="activeMenu = 'inst'" @mouseleave="activeMenu = null">
                    <button class="px-3 py-2 text-[#00225a] font-bold uppercase text-[11px] flex items-center gap-1">
                        Institucional <i data-lucide="chevron-down" class="w-3 h-3"></i>
                    </button>
                    <div x-show="activeMenu === 'inst'" x-cloak class="absolute left-0 top-full bg-white border border-slate-100 shadow-xl rounded-b-lg py-4 w-64">
                        <div class="px-4 py-2 text-orange-500 font-black text-[10px] uppercase border-b mb-2">Reitoria</div>
                        <a href="{{route('manutencao')}}" class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-orange-500 transition">Reitor</a>
                        <a href="{{route('manutencao')}}" class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-orange-500 transition">Gabinetes de Apoio e Assessoria</a>
                        <a href="{{route('manutencao')}}" class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-orange-500 transition border-b">Secretaria Geral</a>
                        <div class="px-4 py-2 text-orange-500 font-black text-[10px] uppercase border-b my-2">Vice-Reitores</div>
                        <a href="{{route('manutencao')}}" class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-orange-500 transition">Vice-Reitor Académico</a>
                        <a href="{{route('manutencao')}}" class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-orange-500 transition">Vice-Reitor Administrativo</a>
                    </div>
                </div>

                <!-- 2. A UniRovuma (MEGA MENU) -->
                <div class="relative" @mouseenter="activeMenu = 'uni'" @mouseleave="activeMenu = null">
                    <button class="px-3 py-2 text-[#00225a] font-bold uppercase text-[11px] flex items-center gap-1">
                        A UniRovuma <i data-lucide="chevron-down" class="w-3 h-3"></i>
                    </button>
                    <!-- Mega Menu Content -->
                    <div x-show="activeMenu === 'uni'" x-cloak class="absolute -left-64 top-full bg-white border shadow-2xl rounded-b-xl p-8 w-[950px] grid grid-cols-4 gap-8">
                        <!-- Col 1: Ensino -->
                        <div class="space-y-3">
                            <h4 class="text-orange-500 font-black text-[10px] uppercase border-b pb-1">Ensino</h4>
                            <ul class="text-[11px] space-y-1.5 text-slate-600">
                                <li><a href="{{route('manutencao')}}" class="hover:text-blue-900 transition">Graduação</a></li>
                                <li><a href="{{route('manutencao')}}" class="hover:text-blue-900 transition">Pós-Graduação</a></li>
                                <li><a href="{{route('manutencao')}}" class="hover:text-blue-900 transition font-bold">Cursos</a></li>
                                <li><a href="{{route('manutencao')}}" class="hover:text-blue-900 transition">Admissão aos cursos</a></li>
                                <li><a href="{{route('manutencao')}}" class="hover:text-blue-900 transition">Especialização</a></li>
                                <li><a href="{{route('manutencao')}}" class="hover:text-blue-900 transition">Portal do Estudante</a></li>
                                <li><a href="{{route('manutencao')}}" class="hover:text-blue-900 transition">Bolsas de Estudo</a></li>
                                <li><a href="{{route('manutencao')}}" class="hover:text-blue-900 transition text-blue-900">UniRovuma em Números</a></li>
                            </ul>
                        </div>
                        <!-- Col 2: Faculdades -->
                        <div class="space-y-3">
                            <h4 class="text-orange-500 font-black text-[10px] uppercase border-b pb-1">Faculdades</h4>
                            <ul class="text-[11px] space-y-1.5 text-slate-600">
                                <li><a href="{{route('manutencao')}}" class="hover:text-blue-900 transition">F. de Ciências</a></li>
                                <li><a href="{{route('manutencao')}}" class="hover:text-blue-900 transition">F. de Engenharia</a></li>
                                <li><a href="{{route('manutencao')}}" class="hover:text-blue-900 transition">F. de Ciências Alimentares</a></li>
                                <li><a href="{{route('manutencao')}}" class="hover:text-blue-900 transition">F. de Economia e Empresariais</a></li>
                                <li><a href="{{route('manutencao')}}" class="hover:text-blue-900 transition">F. de Direito</a></li>
                                <li><a href="{{route('manutencao')}}" class="hover:text-blue-900 transition">F. de Letras</a></li>
                                <li><a href="{{route('manutencao')}}" class="hover:text-blue-900 transition">F. de Ciências Sociais</a></li>
                                <li><a href="{{route('manutencao')}}" class="hover:text-blue-900 transition font-bold">F. de Educação e Psicologia</a></li>
                            </ul>
                        </div>
                        <!-- Col 3: Centros de Estudo -->
                        <div class="space-y-3">
                            <h4 class="text-orange-500 font-black text-[10px] uppercase border-b pb-1">Centros de Estudo</h4>
                            <ul class="text-[11px] space-y-1.5 text-slate-600">
                                <li><a href="{{route('manutencao')}}" class="hover:text-blue-900 transition">Centro de Formação Técnico</a></li>
                                <li><a href="{{route('manutencao')}}" class="hover:text-blue-900 transition">C. de Governação e Conflitos</a></li>
                                <li><a href="{{route('manutencao')}}" class="hover:text-blue-900 transition">C. de Inovação e Tecnologia</a></li>
                                <li><a href="{{route('manutencao')}}" class="hover:text-blue-900 transition">C. de Práticas Educativas</a></li>
                                <li><a href="{{route('manutencao')}}" class="hover:text-blue-900 transition">C. de Psicologia Aplicada</a></li>
                                <li><a href="{{route('manutencao')}}" class="hover:text-blue-900 transition">C. de Territórios e Ambiente</a></li>
                                <li><a href="{{route('manutencao')}}" class="hover:text-blue-900 transition text-blue-800">Centro de Estudos Linguísticos</a></li>
                            </ul>
                        </div>
                        <!-- Col 4: Direcções Centrais -->
                        <div class="space-y-3">
                            <h4 class="text-orange-500 font-black text-[10px] uppercase border-b pb-1">Direcções Centrais</h4>
                            <ul class="text-[11px] space-y-1.5 text-slate-600">
                                <li><a href="{{route('manutencao')}}" class="hover:text-blue-900 transition">Recursos Humanos</a></li>
                                <li><a href="{{route('manutencao')}}" class="hover:text-blue-900 transition">Finanças</a></li>
                                <li><a href="{{route('manutencao')}}" class="hover:text-blue-900 transition">Património</a></li>
                                <li><a href="{{route('manutencao')}}" class="hover:text-blue-900 transition">Tecnologias de Info (TIC)</a></li>
                                <li><a href="{{route('manutencao')}}" class="hover:text-blue-900 transition">Licitação</a></li>
                                <li><a href="{{route('manutencao')}}" class="hover:text-blue-900 transition">Registo Académico</a></li>
                                <li><a href="{{route('manutencao')}}" class="hover:text-blue-900 transition">Pedaógica / Científica</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- 3. Institutos -->
                <div class="relative" @mouseenter="activeMenu = 'insti'" @mouseleave="activeMenu = null">
                    <button class="px-3 py-2 text-[#00225a] font-bold uppercase text-[11px] flex items-center gap-1">
                        Institutos <i data-lucide="chevron-down" class="w-3 h-3"></i>
                    </button>
                    <div x-show="activeMenu === 'insti'" x-cloak class="absolute left-0 top-full bg-white border border-slate-100 shadow-xl rounded-b-lg py-4 w-72">
                        <a href="{{route('manutencao')}}" class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-orange-500 transition">I.S. de Desenvolvimento Rural (Niassa)</a>
                        <a href="{{route('manutencao')}}" class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-orange-500 transition">I.S. de Recursos Naturais (Montepuez)</a>
                        <a href="{{route('manutencao')}}" class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-orange-500 transition">I.S. de Transportes e Logística (Nacala)</a>
                        <a href="{{route('manutencao')}}" class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-orange-500 transition font-bold border-t">I.S. de Educação Aberta e à Distância</a>
                    </div>
                </div>

                <!-- 4. Unidades Especiais -->
                <div class="relative" @mouseenter="activeMenu = 'uni_esp'" @mouseleave="activeMenu = null">
                    <button class="px-3 py-2 text-[#00225a] font-bold uppercase text-[11px] flex items-center gap-1">
                        Unidades <i data-lucide="chevron-down" class="w-3 h-3"></i>
                    </button>
                    <div x-show="activeMenu === 'uni_esp'" x-cloak class="absolute left-0 top-full bg-white border border-slate-100 shadow-xl rounded-b-lg py-4 w-64">
                        <a href="{{route('manutencao')}}" class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 transition">Editora e Imprensa</a>
                        <a href="{{route('manutencao')}}" class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 transition">Documentação e Informação</a>
                        <a href="{{route('manutencao')}}" class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 transition">Acção Social</a>
                        <a href="{{route('manutencao')}}" class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 transition">Centro Cultural</a>
                        <a href="{{route('manutencao')}}" class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 transition">Infra-Estruturas / Sistemas de Gestão</a>
                    </div>
                </div>

                <!-- 5. Pesquisa -->
                <div class="relative" @mouseenter="activeMenu = 'pesq'" @mouseleave="activeMenu = null">
                    <button class="px-3 py-2 text-[#00225a] font-bold uppercase text-[11px] flex items-center gap-1">
                        Pesquisa <i data-lucide="chevron-down" class="w-3 h-3"></i>
                    </button>
                    <div x-show="activeMenu === 'pesq'" x-cloak class="absolute left-0 top-full bg-white border border-slate-100 shadow-xl rounded-b-lg py-4 w-56">
                        <a href="{{route('manutencao')}}" class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 transition">Política de Pesquisa</a>
                        <a href="{{route('manutencao')}}" class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 transition font-bold">Centros de Pesquisa</a>
                        <a href="{{route('manutencao')}}" class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 transition">Pesquisadores</a>
                    </div>
                </div>

                <!-- 6. Serviços Online -->
                <div class="relative" @mouseenter="activeMenu = 'serv'" @mouseleave="activeMenu = null">
                    <button class="px-3 py-2 text-white bg-orange-500 rounded-full font-black uppercase text-[10px] flex items-center gap-1 ml-2 hover:bg-[#00225a] transition shadow-md">
                        Serviços Online <i data-lucide="globe" class="w-3 h-3"></i>
                    </button>
                    <div x-show="activeMenu === 'serv'" x-cloak class="absolute right-0 top-full bg-white border border-slate-100 shadow-2xl rounded-b-lg py-6 w-80 grid grid-cols-1 gap-1">
                        <a href="{{route('manutencao')}}" class="px-6 py-2 text-xs text-slate-700 hover:bg-slate-50 flex justify-between">Provedor do Estudante <i data-lucide="external-link" class="w-3 h-3 opacity-50"></i></a>
                        <a href="{{route('manutencao')}}" class="px-6 py-2 text-xs text-slate-700 hover:bg-slate-50 font-bold border-t">Repositório Institucional</a>
                        <a href="{{route('manutencao')}}" class="px-6 py-2 text-xs text-slate-700 hover:bg-slate-50">Biblioteca Digital</a>
                        <a href="{{route('manutencao')}}" class="px-6 py-2 text-xs text-slate-700 hover:bg-slate-50">Revista Científica / Exames</a>
                        <a href="{{route('manutencao')}}" class="px-6 py-2 text-xs text-orange-600 hover:bg-slate-50 font-black uppercase border-t">Acesso Restrito</a>
                        <a href="{{route('manutencao')}}" class="px-6 py-2 text-xs text-slate-700 hover:bg-slate-50 border-t">Laboratórios Virtuais</a>
                        <a href="{{route('manutencao')}}" class="px-6 py-2 text-xs text-slate-700 hover:bg-slate-50">Programa de Mobilidade / Erasmus</a>
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
    <div x-show="mobileMenu" x-cloak class="fixed inset-0 z-[200] bg-white overflow-y-auto p-6 lg:hidden">
        <div class="flex justify-between items-center mb-8">
            <img src="{{ asset('images/logotipo-unirovuma.png') }}" class="h-12">
            <button @click="mobileMenu = false" class="text-blue-900"><i data-lucide="x" class="w-8 h-8"></i></button>
        </div>
        <nav class="flex flex-col gap-4 uppercase font-black text-blue-900 text-sm">
            <a href="{{route('manutencao')}}" class="py-3 border-b">Início</a>
            <a href="{{route('manutencao')}}" class="py-3 border-b">Institucional</a>
            <a href="{{route('manutencao')}}" class="py-3 border-b">A UniRovuma</a>
            <a href="{{route('manutencao')}}" class="py-3 border-b">Institutos</a>
            <a href="{{route('manutencao')}}" class="py-3 border-b">Pesquisa</a>
            <a href="{{route('manutencao')}}" class="py-3 text-orange-600">Serviços Online</a>
        </nav>
    </div>
</header>