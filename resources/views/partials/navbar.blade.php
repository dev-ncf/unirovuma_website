<header class="bg-white sticky top-0 z-[100] shadow-sm font-sans" x-data="{ mobileMenu: false, activeMenu: null }">
    <!-- Top Bar (Informações de Contato e Acesso Rápido) -->
    <div class="bg-[#00225a] text-white py-2 px-4 hidden lg:block">
        <div class="container mx-auto flex justify-between items-center text-[10px]  font-bold tracking-widest">
            <div class="flex gap-6">
                <span class="flex items-center gap-1.5"><i data-lucide="phone" class="w-3 h-3 text-orange-400"></i> (+258)
                    840731777</span>
                <span class="flex items-center gap-1.5 lowercase font-medium"><i data-lucide="mail"
                        class="w-3 h-3 text-orange-400"></i> secretariageral@unirovuma.ac.mz</span>
            </div>
            <div class="flex gap-4">
                <a href="https://web.facebook.com/UniRovuma" target="_blank" class="hover:text-orange-400 transition"><i
                        data-lucide="facebook" class="w-3.5 h-3.5"></i></a>
                <a href="https://www.youtube.com/c/UniversidadeRovuma" target="_blank"
                    class="hover:text-orange-400 transition"><i data-lucide="youtube" class="w-3.5 h-3.5"></i></a>
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
            <a href="/" class="flex items-center gap-2 text-blue-900 font-black ">
                <img src="{{ asset('images/logotipo-unirovuma.png') }}" alt="UniRovuma" class="h-14 lg:h-16">
                <div class="flex flex-col">
                    <span>UNIVERSIDADE</span>
                    <span class="flex items-center gap-2 text-orange-500">ROVUMA</span>
                </div>
            </a>

            <!-- Desktop Menu -->
            <nav class="hidden lg:flex items-center gap-1">
                <a href="/"
                    class="px-3 py-2 text-[#00225a] font-bold  text-[11pt] hover:text-orange-500 transition">Início</a>

                <!-- 1. Institucional Dropdown -->
                <div class="relative" @mouseenter="activeMenu = 'inst'" @mouseleave="activeMenu = null">
                    <button class="px-3 py-2 text-[#00225a] font-bold  text-[11pt] flex items-center gap-1">
                        Institucional <i data-lucide="chevron-down" class="w-3 h-3"></i>
                    </button>
                    <div x-show="activeMenu === 'inst'" x-cloak
                        class="absolute left-0 top-full bg-white border border-slate-100 shadow-xl rounded-b-lg py-4 w-64">
                        <div class="px-4 py-2 text-orange-500 font-black text-[10px]  border-b mb-2">Reitoria</div>
                        <a href="{{ route('manutencao') }}"
                            class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-orange-500 transition">Reitor</a>
                        <a href="{{ route('manutencao') }}"
                            class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-orange-500 transition">Gabinetes
                            de Apoio e Assessoria</a>
                        <a href="{{ route('manutencao') }}"
                            class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-orange-500 transition border-b">Secretaria
                            Geral</a>
                        <div class="px-4 py-2 text-orange-500 font-black text-[10px]  border-b my-2">Vice-Reitores</div>
                        <a href="{{ route('manutencao') }}"
                            class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-orange-500 transition">Vice-Reitor
                            Académico</a>
                        <a href="{{ route('manutencao') }}"
                            class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-orange-500 transition">Vice-Reitor
                            Administrativo</a>
                    </div>
                </div>

                <!-- 2. A UniRovuma (MEGA MENU) -->
                <div class="relative" @mouseenter="activeMenu = 'uni'" @mouseleave="activeMenu = null">
                    <button class="px-3 py-2 text-[#00225a] font-bold  text-[11pt] flex items-center gap-1">
                        A UniRovuma <i data-lucide="chevron-down" class="w-3 h-3"></i>
                    </button>
                    <!-- Mega Menu Content -->
                    <div x-show="activeMenu === 'uni'" x-cloak
                        class="absolute -left-64 top-full bg-white border shadow-2xl rounded-b-xl p-8 w-[950px] grid grid-cols-4 gap-8">
                        <!-- Col 1: Ensino -->
                        <div class="space-y-3">
                            <h4 class="text-orange-500 font-black text-[10px]  border-b pb-1">Ensino</h4>
                            <ul class="text-[11pt] space-y-1.5 text-slate-600">
                                <li><a href="{{ route('manutencao') }}"
                                        class="hover:text-blue-900 transition">Graduação</a></li>
                                <li><a href="{{ route('manutencao') }}"
                                        class="hover:text-blue-900 transition">Pós-Graduação</a></li>
                                <li><a href="{{ route('manutencao') }}"
                                        class="hover:text-blue-900 transition">Cursos</a></li>
                                <li><a href="{{ route('manutencao') }}" class="hover:text-blue-900 transition">Admissão
                                        aos cursos</a></li>
                                <li><a href="{{ route('manutencao') }}"
                                        class="hover:text-blue-900 transition">Especialização</a></li>
                                <li><a href="{{ route('manutencao') }}" class="hover:text-blue-900 transition">Portal
                                        do Estudante</a></li>
                                <li><a href="{{ route('manutencao') }}" class="hover:text-blue-900 transition">Bolsas
                                        de Estudo</a></li>
                                <li><a href="{{ route('manutencao') }}"
                                        class="hover:text-blue-900 transition text-blue-900">UniRovuma em Números</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Col 2: Faculdades -->
                        <div class="space-y-3">
                            <h4 class="text-orange-500 font-black text-[10px]  border-b pb-1">Faculdades</h4>
                            <ul class="text-[11pt] space-y-1.5 text-slate-600">
                                <li><a href="{{ route('manutencao') }}"
                                        class="hover:text-blue-900 transition">Faculdade de Ciências</a></li>
                                <li><a href="{{ route('manutencao') }}"
                                        class="hover:text-blue-900 transition">Faculdade de Ciências Alimentares e
                                        Agrárias </a></li>
                                <li><a href="{{ route('manutencao') }}"
                                        class="hover:text-blue-900 transition">Faculdade de Ciências Económicas e
                                        Empresariais</a></li>
                                <li><a href="{{ route('manutencao') }}"
                                        class="hover:text-blue-900 transition">Faculdade de Ciências Sociais e
                                        Filosofia</a></li>
                                <li><a href="{{ route('manutencao') }}"
                                        class="hover:text-blue-900 transition">Faculdade de Educação e Psicologia</a>
                                </li>
                                <li><a href="{{ route('manutencao') }}"
                                        class="hover:text-blue-900 transition">Faculdade de Engenharia</a></li>
                                <li><a href="{{ route('manutencao') }}"
                                        class="hover:text-blue-900 transition">Faculdade de Direito</a></li>
                                <li><a href="{{ route('manutencao') }}"
                                        class="hover:text-blue-900 transition">Faculdade de Letras</a></li>
                            </ul>
                        </div>
                        <!-- Col 3: Centros de Estudo -->
                        <div class="space-y-3">
                            <h4 class="text-orange-500 font-black text-[10px]  border-b pb-1">Centros de Estudo</h4>
                            <ul class="text-[11pt] space-y-1.5 text-slate-600">
                                <li><a href="{{ route('manutencao') }}" class="hover:text-blue-900 transition">Centro
                                        de Formação Técnico profissional</a></li>
                                <li><a href="{{ route('manutencao') }}" class="hover:text-blue-900 transition">Centro
                                        de Estudos em Governação, Conflitos e Direitos Humanos</a></li>
                                <li><a href="{{ route('manutencao') }}" class="hover:text-blue-900 transition">Centro
                                        de Estudos de Ciências Aplicadas, Inovação e Transferência de Tecnologia</a>
                                </li>
                                <li><a href="{{ route('manutencao') }}" class="hover:text-blue-900 transition">Centro
                                        de Estudos em Políticas e Práticas Educativas</a></li>
                                <li><a href="{{ route('manutencao') }}" class="hover:text-blue-900 transition">Centro
                                        de Estudos em Psicologia Aplicada</a></li>
                                <li><a href="{{ route('manutencao') }}" class="hover:text-blue-900 transition">Centro
                                        de Estudo em Territórios, Ambiente e Recursos Naturais</a></li>
                                <li><a href="{{ route('manutencao') }}"
                                        class="hover:text-blue-900 transition ">Centro de Estudos Linguísticos e
                                        Culturais</a></li>
                                <li><a href="{{ route('manutencao') }}"
                                        class="hover:text-blue-900 transition ">Centro de Práticas e Treinamento
                                        Desportivo</a></li>
                                <li><a href="{{ route('manutencao') }}"
                                        class="hover:text-blue-900 transition ">Centro de Produção e Processamento de
                                        Alimentos</a></li>
                            </ul>
                        </div>
                        <!-- Col 4: Direcções Centrais -->
                        <div class="space-y-3">
                            <h4 class="text-orange-500 font-black text-[10px]  border-b pb-1">Direcções Centrais</h4>
                            <ul class="text-[11pt] space-y-1.5 text-slate-600">
                                <li><a href="{{ route('manutencao') }}"
                                        class="hover:text-blue-900 transition">Direcção de Recursos Humanos</a></li>
                                <li><a href="{{ route('manutencao') }}"
                                        class="hover:text-blue-900 transition">Direcção de Finanças</a></li>
                                <li><a href="{{ route('manutencao') }}"
                                        class="hover:text-blue-900 transition">Direcção de Património</a></li>
                                <li><a href="{{ route('manutencao') }}"
                                        class="hover:text-blue-900 transition">Direcção de Tecnologias de Informação e
                                        Comunicação (TIC)</a></li>
                                <li><a href="{{ route('manutencao') }}"
                                        class="hover:text-blue-900 transition">Direcção de Licitação</a></li>
                                <li><a href="{{ route('manutencao') }}"
                                        class="hover:text-blue-900 transition">Direcção de Registo Académico</a></li>
                                <li><a href="{{ route('manutencao') }}"
                                        class="hover:text-blue-900 transition">Direcção Pedaógica</a></li>
                                <li><a href="{{ route('manutencao') }}"
                                        class="hover:text-blue-900 transition">Direcção Científica</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- 3. Institutos -->
                <div class="relative" @mouseenter="activeMenu = 'insti'" @mouseleave="activeMenu = null">
                    <button class="px-3 py-2 text-[#00225a] font-bold  text-[11pt] flex items-center gap-1">
                        Institutos <i data-lucide="chevron-down" class="w-3 h-3"></i>
                    </button>
                    <div x-show="activeMenu === 'insti'" x-cloak
                        class="absolute left-0 top-full bg-white border border-slate-100 shadow-xl rounded-b-lg py-4 w-72">
                        <a href="{{ route('manutencao') }}"
                            class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-orange-500 transition">Instituto
                            Superior de Desenvolvimento rural e Biociências (Niassa)</a>
                        <a href="{{ route('manutencao') }}"
                            class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-orange-500 transition">Instituto
                            Superior de Recursos Naturais e Ambiente (Montepuez)</a>
                        <a href="{{ route('manutencao') }}"
                            class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-orange-500 transition">Instituto
                            Superior de Transporte Logística e Telecomunicações (Nacala)</a>
                        <a href="{{ route('manutencao') }}"
                            class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 hover:text-orange-500 transition font-bold border-t">Instituto
                            Superior de Educação Aberta e à Distância (Pemba)</a>
                    </div>
                </div>

                <!-- 4. Unidades Especiais -->
                <div class="relative" @mouseenter="activeMenu = 'uni_esp'" @mouseleave="activeMenu = null">
                    <button class="px-3 py-2 text-[#00225a] font-bold  text-[11pt] flex items-center gap-1">
                        Unidades Especiais <i data-lucide="chevron-down" class="w-3 h-3"></i>
                    </button>
                    <div x-show="activeMenu === 'uni_esp'" x-cloak
                        class="absolute left-0 top-full bg-white border border-slate-100 shadow-xl rounded-b-lg py-4 w-64">
                        <a href="{{ route('manutencao') }}"
                            class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 transition">Editora e
                            Imprensa Universitária</a>
                        <a href="{{ route('manutencao') }}"
                            class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 transition">Serviços de
                            Documentação e Informação</a>
                        <a href="{{ route('manutencao') }}"
                            class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 transition">Serviços de
                            Acção Social</a>
                        <a href="{{ route('manutencao') }}"
                            class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 transition">Serviços
                            Especiais Integrados</a>
                        <a href="{{ route('manutencao') }}"
                            class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 transition">Centro Cultural
                            da Universidade Rovuma</a>
                        <a href="{{ route('manutencao') }}"
                            class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 transition">Centro de
                            Desenvolvimento de Infra-Estrutura Universitária</a>
                        <a href="{{ route('manutencao') }}"
                            class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 transition">Centro de
                            Desenvolvimento de Sistemas de Gestão Universitária</a>
                    </div>
                </div>

                <!-- 5. Pesquisa -->
                <div class="relative" @mouseenter="activeMenu = 'pesq'" @mouseleave="activeMenu = null">
                    <button class="px-3 py-2 text-[#00225a] font-bold  text-[11pt] flex items-center gap-1">
                        Pesquisa <i data-lucide="chevron-down" class="w-3 h-3"></i>
                    </button>
                    <div x-show="activeMenu === 'pesq'" x-cloak
                        class="absolute left-0 top-full bg-white border border-slate-100 shadow-xl rounded-b-lg py-4 w-56">
                        <a href="{{ route('manutencao') }}"
                            class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 transition">Política de
                            Pesquisa</a>
                        <a href="{{ route('manutencao') }}"
                            class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 transition font-bold">Centros
                            de Pesquisa</a>
                        <a href="{{ route('manutencao') }}"
                            class="block px-6 py-2 text-xs text-slate-600 hover:bg-slate-50 transition">Pesquisadores</a>
                    </div>
                </div>

                <!-- 6. Serviços Online -->
                <div class="relative" @mouseenter="activeMenu = 'serv'" @mouseleave="activeMenu = null">
                    <button
                        class="px-3 py-2 text-white bg-orange-500 rounded-full font-black  text-[10px] flex items-center gap-1 ml-2 hover:bg-[#00225a] transition shadow-md">
                        Serviços Online <i data-lucide="globe" class="w-3 h-3"></i>
                    </button>
                    <div x-show="activeMenu === 'serv'" x-cloak
                        class="absolute right-0 top-full bg-white border border-slate-100 shadow-2xl rounded-b-lg py-6 w-80 grid grid-cols-1 gap-1">
                        <a href="{{ route('manutencao') }}"
                            class="px-6 py-2 text-xs text-slate-700 hover:bg-slate-50 flex justify-between">Provedor do
                            Estudante <i data-lucide="external-link" class="w-3 h-3 opacity-50"></i></a>
                        <a href="{{ route('manutencao') }}"
                            class="px-6 py-2 text-xs text-slate-700 hover:bg-slate-50 font-bold border-t">Repositório
                            Institucional</a>
                        <a href="{{ route('manutencao') }}"
                            class="px-6 py-2 text-xs text-slate-700 hover:bg-slate-50">Biblioteca Digital</a>
                        <a href="{{ route('manutencao') }}"
                            class="px-6 py-2 text-xs text-slate-700 hover:bg-slate-50">Revista Científica / Exames</a>
                        <a href="{{ route('manutencao') }}"
                            class="px-6 py-2 text-xs text-orange-600 hover:bg-slate-50 font-black  border-t">Acesso
                            Restrito</a>
                        <a href="{{ route('manutencao') }}"
                            class="px-6 py-2 text-xs text-slate-700 hover:bg-slate-50 border-t">Laboratórios
                            Virtuais</a>
                        <a href="{{ route('manutencao') }}"
                            class="px-6 py-2 text-xs text-slate-700 hover:bg-slate-50">Programa de Mobilidade /
                            Erasmus</a>
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
    <!-- Mobile Menu Canvas -->
    <div x-show="mobileMenu" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full" x-cloak
        class="fixed inset-0 z-[200] bg-white overflow-y-auto p-6 lg:hidden" x-data="{ openSection: null }">

        <!-- Header Mobile -->
        <div class="flex justify-between items-center mb-8 border-b pb-4">
            <img src="{{ asset('images/logotipo-unirovuma.png') }}" class="h-10"> <span class="text-blue-900 font-black text-lg">UNIROVUMA</span>
            <button @click="mobileMenu = false" class="text-blue-900 flex items-center gap-2 font-bold text-xs">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
        </div>

        <nav class="flex flex-col gap-2  font-black text-blue-900 text-xs tracking-wider">

            <!-- INÍCIO -->
            <a href="/" class="py-4 border-b flex justify-between items-center">
                Início <i data-lucide="home" class="w-4 h-4 text-slate-400"></i>
            </a>

            <!-- 1. INSTITUCIONAL -->
            <div class="border-b">
                <button @click="openSection = (openSection === 'inst' ? null : 'inst')"
                    class="w-full py-4 flex justify-between items-center text-left">
                    Institucional <i data-lucide="chevron-down" class="w-4 h-4 transition-transform"
                        :class="openSection === 'inst' ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openSection === 'inst'"
                    class="pl-4 pb-4 space-y-3 normal-case font-medium text-slate-600 border-l-2 border-orange-500 ml-2">
                    <a href="{{ route('manutencao') }}" class="block py-1 hover:text-orange-500">Reitor</a>
                    <a href="{{ route('manutencao') }}" class="block py-1 hover:text-orange-500">Gabinetes de Apoio e
                        Assessoria</a>
                    <a href="{{ route('manutencao') }}" class="block py-1 hover:text-orange-500">Secretaria Geral</a>
                    <a href="{{ route('manutencao') }}"
                        class="block py-1 hover:text-orange-500 border-t pt-2 font-bold text-blue-900">Vice-Reitor
                        Académico</a>
                    <a href="{{ route('manutencao') }}"
                        class="block py-1 hover:text-orange-500 font-bold text-blue-900">Vice-Reitor Administrativo</a>
                </div>
            </div>

            <!-- 2. A UNIROVUMA (MEGA ACORDION) -->
            <div class="border-b" x-data="{ subSection: null }">
                <button @click="openSection = (openSection === 'uni' ? null : 'uni')"
                    class="w-full py-4 flex justify-between items-center text-left text-orange-600">
                    A UniRovuma <i data-lucide="chevron-down" class="w-4 h-4 transition-transform"
                        :class="openSection === 'uni' ? 'rotate-180' : ''"></i>
                </button>

                <div x-show="openSection === 'uni'" class="pl-4 pb-4 space-y-4 font-bold text-[11pt]">

                    <!-- Ensino -->
                    <div>
                        <button @click="subSection = (subSection === 'ensino' ? null : 'ensino')"
                            class="flex items-center gap-2 py-2 text-blue-800  tracking-tighter">
                            <i data-lucide="book-open" class="w-3.5 h-3.5"></i> Ensino
                        </button>
                        <div x-show="subSection === 'ensino'"
                            class="pl-6 space-y-2 normal-case font-medium text-slate-500 border-l">
                            <a href="{{ route('manutencao') }}" class="block">Graduação</a>
                            <a href="{{ route('manutencao') }}" class="block">Pós-Graduação</a>
                            <a href="{{ route('manutencao') }}" class="block">Cursos</a>
                            <a href="{{ route('manutencao') }}" class="block">Bolsas de Estudo</a>
                            <a href="{{ route('manutencao') }}" class="block">Corpo Docente</a>
                        </div>
                    </div>

                    <!-- Faculdades -->
                    <div>
                        <button @click="subSection = (subSection === 'fac' ? null : 'fac')"
                            class="flex items-center gap-2 py-2 text-blue-800  tracking-tighter">
                            <i data-lucide="building-2" class="w-3.5 h-3.5"></i> Faculdades
                        </button>
                        <div x-show="subSection === 'fac'"
                            class="pl-6 space-y-2 normal-case font-medium text-slate-500 border-l">
                            <a href="{{ route('manutencao') }}" class="block">Faculdade de Ciências</a>
                            <a href="{{ route('manutencao') }}" class="block">Faculdade de Ciências Alimentares e
                                Agrárias </a>
                            <a href="{{ route('manutencao') }}" class="block">Faculdade de Ciências Económicas e
                                Empresariais</a>
                            <a href="{{ route('manutencao') }}" class="block">Faculdade de Ciências Sociais e
                                Filosofia</a>
                            <a href="{{ route('manutencao') }}" class="block">Faculdade de Direito</a>
                            <a href="{{ route('manutencao') }}" class="block">Faculdade de Educação e Psicologia</a>
                            <a href="{{ route('manutencao') }}" class="block">Faculdade de Engenharia</a>
                            <a href="{{ route('manutencao') }}" class="block">Faculdade de Letras</a>
                        </div>
                    </div>
                    <div>
                        <button @click="subSection = (subSection === 'centro' ? null : 'centro')"
                            class="flex items-center gap-2 py-2 text-blue-800  tracking-tighter">
                            <i data-lucide="building-2" class="w-3.5 h-3.5"></i> Centros de Estudo
                        </button>
                        <div x-show="subSection === 'centro'"
                            class="pl-6 space-y-2 normal-case font-medium text-slate-500 border-l">
                            <a href="{{ route('manutencao') }}" class="block">Centro de Formação Técnico
                                profissional</a>
                            <a href="{{ route('manutencao') }}" class="block">Centro de Estudos em Governação,
                                Conflitos e Direitos Humanos</a>
                            <a href="{{ route('manutencao') }}" class="block">Centro de Estudos de Ciências
                                Aplicadas, Inovação e Transferência de Tecnologia</a>
                            <a href="{{ route('manutencao') }}" class="block">Centro de Estudos em Políticas e
                                Práticas Educativas</a>
                            <a href="{{ route('manutencao') }}" class="block">Centro de Estudos em Psicologia
                                Aplicada</a>
                            <a href="{{ route('manutencao') }}" class="block">Centro de Estudo em Territórios,
                                Ambiente e Recursos Naturais</a>
                            <a href="{{ route('manutencao') }}" class="block ">Centro de Estudos Linguísticos e
                                Culturais</a>
                            <a href="{{ route('manutencao') }}" class="block ">Centro de Práticas e Treinamento
                                Desportivo</a>
                            <a href="{{ route('manutencao') }}" class="block ">Centro de Produção e Processamento de
                                Alimentos</a>
                        </div>
                    </div>

                    <!-- Direcções -->
                    <div>
                        <button @click="subSection = (subSection === 'dir' ? null : 'dir')"
                            class="flex items-center gap-2 py-2 text-blue-800  tracking-tighter">
                            <i data-lucide="users" class="w-3.5 h-3.5"></i> Direcções Centrais
                        </button>
                        <div x-show="subSection === 'dir'"
                            class="pl-6 space-y-2 normal-case font-medium text-slate-500 border-l text-[10px]">
                            <a href="{{ route('manutencao') }}" class="hover:text-blue-900 transition">Direcção de
                                Recursos Humanos</a>
                            <a href="{{ route('manutencao') }}" class="hover:text-blue-900 transition">Direcção de
                                Finanças</a>
                            <a href="{{ route('manutencao') }}" class="hover:text-blue-900 transition">Direcção de
                                Património</a>
                            <a href="{{ route('manutencao') }}" class="hover:text-blue-900 transition">Direcção de
                                Tecnologias de Informação e Comunicação (TIC)</a>
                            <a href="{{ route('manutencao') }}" class="hover:text-blue-900 transition">Direcção de
                                Licitação</a>
                            <a href="{{ route('manutencao') }}" class="hover:text-blue-900 transition">Direcção de
                                Registo Académico</a>
                            <a href="{{ route('manutencao') }}" class="hover:text-blue-900 transition">Direcção
                                Pedaógica</a>
                            <a href="{{ route('manutencao') }}" class="hover:text-blue-900 transition">Direcção
                                Científica</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. INSTITUTOS -->
            <div class="border-b">
                <button @click="openSection = (openSection === 'insti' ? null : 'insti')"
                    class="w-full py-4 flex justify-between items-center text-left">
                    Institutos <i data-lucide="chevron-down" class="w-4 h-4 transition-transform"
                        :class="openSection === 'insti' ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openSection === 'insti'"
                    class="pl-4 pb-4 space-y-3 normal-case font-medium text-slate-600 border-l ml-2">
                    <a href="{{ route('manutencao') }}" class="block py-1 italic">ISDRB - I.S.  Desenvolvimento rural e Biociências (Niassa)</a>
                    <a href="{{ route('manutencao') }}" class="block py-1 italic">ISRNA - I.S. de Recursos Naturais e Ambiente (Montepuez)</a>
                    <a href="{{ route('manutencao') }}" class="block py-1 italic">ISTLT - I.S. de Transporte Logística e Telecomunicações (Nacala)</a>
                    <a href="{{ route('manutencao') }}" class="block py-1 font-bold text-orange-600">I.S.Educação Aberta
                        e à Distância (EaD)</a>
                </div>
            </div>

            <!-- 4. PESQUISA -->
            <div class="border-b">
                <button @click="openSection = (openSection === 'pesq' ? null : 'pesq')"
                    class="w-full py-4 flex justify-between items-center text-left">
                    Pesquisa <i data-lucide="chevron-down" class="w-4 h-4 transition-transform"
                        :class="openSection === 'pesq' ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openSection === 'pesq'"
                    class="pl-4 pb-4 space-y-3 normal-case font-medium text-slate-600 border-l ml-2">
                    <a href="{{ route('manutencao') }}" class="block">Política de Pesquisa</a>
                    <a href="{{ route('manutencao') }}" class="block">Centros de Pesquisa</a>
                    <a href="{{ route('manutencao') }}" class="block">Pesquisadores</a>
                </div>
            </div>

            <!-- 5. SERVIÇOS ONLINE -->
            <div class="mt-4">
                <button @click="openSection = (openSection === 'serv' ? null : 'serv')"
                    class="w-full py-4 px-4 bg-orange-500 text-white rounded-xl flex justify-between items-center shadow-lg">
                    Serviços Online <i data-lucide="globe" class="w-5 h-5 transition-transform"
                        :class="openSection === 'serv' ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openSection === 'serv'"
                    class="mt-2 p-4 bg-slate-50 rounded-xl space-y-3 normal-case font-bold text-slate-700 text-[11pt]">
                    <a href="{{ route('manutencao') }}" class="flex justify-between items-center">SIGEUR <i
                            data-lucide="external-link" class="w-3 h-3"></i></a>
                    <a href="https://sigim.unirovuma.ac.mz/"
                        class="flex justify-between items-center border-t pt-2">SIGIM (Mestrandos) <i
                            data-lucide="external-link" class="w-3 h-3"></i></a>
                    <a href="{{ route('manutencao') }}"
                        class="flex justify-between items-center border-t pt-2 text-orange-600">REPOSITÓRIO
                        INSTITUCIONAL</a>
                    <a href="{{ route('manutencao') }}"
                        class="flex justify-between items-center border-t pt-2 text-red-600  italic">Acesso
                        Restrito</a>
                </div>
            </div>

        </nav>

        <!-- Rodapé do Menu Mobile -->
        <div class="mt-12 pt-8 border-t text-center space-y-4">
            <p class="text-[10px] text-slate-400 font-bold  tracking-widest">Universidade Rovuma</p>
            <div class="flex justify-center gap-6 text-blue-900">
                <a href="{{ route('manutencao') }}"><i data-lucide="facebook" class="w-6 h-6"></i></a>
                <a href="{{ route('manutencao') }}"><i data-lucide="youtube" class="w-6 h-6"></i></a>
                <a href="{{ route('manutencao') }}"><i data-lucide="mail" class="w-6 h-6"></i></a>
            </div>
        </div>
    </div>
</header>
