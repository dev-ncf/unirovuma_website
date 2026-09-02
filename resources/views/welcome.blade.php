@extends('layouts.app')

@section('content')
    <!-- CAROUSEL PRINCIPAL (Swiper) -->
    <section class="relative group">
        <div class="swiper mySwiper h-[550px] md:h-[700px] w-full">
            <div class="swiper-wrapper text-white">

                <!-- SLIDE 1 (PRIORIDADE): CICTED 2026 -->
                <div class="swiper-slide bg-slate-900 relative overflow-hidden">
                    <img src="{{ asset('images/cicted-2026.jpg') }}" alt="CICTED UniRovuma 2026"
                        class="absolute inset-0 w-full h-full object-cover opacity-60 transition-transform duration-[10s] scale-110 group-hover:scale-100">
                    <div class="absolute inset-0 bg-gradient-to-r from-[#00225a] via-[#00225a]/60 to-transparent"></div>
                    <div
                        class="relative z-10 h-full container mx-auto px-6 flex flex-col justify-center items-start space-y-6">
                        <span
                            class="bg-orange-600 px-4 py-1.5 rounded-full text-xs font-black uppercase tracking-[0.2em] shadow-lg flex items-center gap-2">
                            <i data-lucide="mic-2" class="w-4 h-4"></i> Evento Internacional
                        </span>
                        <h2 class="text-4xl md:text-7xl font-black leading-none max-w-4xl uppercase italic">
                            CICTED <br>
                            <span class="text-orange-400 not-italic">UniRovuma 2026</span>
                        </h2>
                        <p class="text-sm md:text-xl opacity-90 max-w-2xl font-light leading-relaxed">
                            Congresso Internacional de Ciência, Tecnologia e Desenvolvimento. Participe do maior evento
                            científico da região norte.
                            <strong class="block mt-2 text-white"><i data-lucide="calendar"
                                    class="inline w-5 h-5 mr-1 text-orange-400"></i> Novembro 2026</strong>
                        </p>
                        <div class="flex flex-wrap gap-4 pt-2">
                            <a href="https://cicted-unirovuma.co.mz/" target="_blank"
                                class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 rounded-xl font-black uppercase text-sm transition-all shadow-2xl flex items-center gap-2">
                                Para mais informacoes <i data-lucide="external-link" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- SLIDE 2: MOBILIDADE ERASMUS+ ESTUDANTES -->
                <div class="swiper-slide bg-slate-900 relative">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#003366] via-[#003366]/60 to-transparent"></div>
                    <div
                        class="relative z-10 h-full container mx-auto px-6 flex flex-col justify-center items-start space-y-6">
                        <span
                            class="bg-yellow-500 text-blue-900 px-3 py-1 rounded-full text-xs font-black uppercase tracking-widest">Candidaturas
                            Abertas</span>
                        <h2 class="text-4xl md:text-7xl font-black leading-none text-white uppercase italic">
                            BOLSAS ERASMUS+ <br>
                            <span class="text-yellow-400 not-italic">Espanha 2026/2027</span>
                        </h2>
                        <p class="text-sm md:text-lg opacity-90 max-w-xl font-light leading-relaxed">
                            Oportunidades de mobilidade para estudantes de Licenciatura e Mestrado na Universidade de
                            Valladolid.
                            <span
                                class="block font-bold text-yellow-400 mt-2 italic border-l-2 border-yellow-400 pl-3">Prazo:
                                Até 05 de Maio de 2026.</span>
                        </p>
                        <div class="flex flex-wrap gap-4">
                            <a href="{{route('manutencao')}}"
                                class="bg-blue-600 text-white px-8 py-4 rounded-xl font-bold hover:bg-blue-700 transition shadow-xl flex items-center gap-2">
                                <i data-lucide="file-text" class="w-4 h-4"></i> Ver Edital
                            </a>
                            <a href="https://uvamobplus2.uva.es/publico/apply" target="_blank"
                                class="bg-yellow-500 text-blue-900 px-8 py-4 rounded-xl font-black hover:bg-yellow-400 transition shadow-xl uppercase text-sm">
                                Candidatar-me
                            </a>
                        </div>
                    </div>
                </div>

                <!-- SLIDE 3: RESULTADOS EaD -->

                <div class="swiper-slide bg-slate-900 relative">
                    <img src="{{ asset('images/tanzania-ur.jpg') }}"
                        class="absolute inset-0 w-full h-full object-cover opacity-50">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#00225a] via-[#00225a]/60 to-transparent"></div>
                    <div
                        class="relative z-10 h-full container mx-auto px-6 flex flex-col justify-center items-start space-y-4">
                        <h2 class="text-4xl md:text-7xl font-black leading-tight text-white uppercase italic">
                            A UNIROVUMA FIRMA PARCERIA COM UM INSTITUTO TANZANIANO
                            <br>
                            <span class="text-orange-400">UniRovuma 2026</span>
                        </h2>
                        <p class="text-sm md:text-lg opacity-90 max-w-2xl font-light italic">
                            A Universidade Rovuma (UniRovuma) acaba de assinar um Memorando de Entendimento (MdE) com a Tanzânia Institute for...
                        </p>
                        <a href="{{route('manutencao')}}"
                            class="bg-orange-500 text-white px-8 py-4 rounded-xl font-bold hover:bg-orange-600 transition flex items-center gap-2 shadow-lg">
                            <i data-lucide="image" class="w-5 h-5"></i>Mais detalhes
                        </a>
                    </div>
                </div>
                <!-- SLIDE 4: AULA INAUGURAL -->
                <div class="swiper-slide bg-slate-900 relative">
                    <img src="{{ asset('images/aula-dinter.jpg') }}"
                        class="absolute inset-0 w-full h-full object-cover opacity-50">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#00225a] via-[#00225a]/60 to-transparent"></div>
                    <div
                        class="relative z-10 h-full container mx-auto px-6 flex flex-col justify-center items-start space-y-4">
                        <h2 class="text-4xl md:text-7xl font-black leading-tight text-white uppercase italic">
                            AULA INAUGURAL DINTER <br>
                            <span class="text-orange-400">UniRovuma 2026</span>
                        </h2>
                        <p class="text-sm md:text-lg opacity-90 max-w-2xl font-light italic">
                            Participe!
                        </p>
                        <a href="{{route('manutencao')}}"
                            class="bg-orange-500 text-white px-8 py-4 rounded-xl font-bold hover:bg-orange-600 transition flex items-center gap-2 shadow-lg">
                            <i data-lucide="image" class="w-5 h-5"></i> Visualizar Cartaz
                        </a>
                    </div>
                </div>

            </div>

            <!-- CONTROLES -->
            <div
                class="swiper-button-next !text-white !w-12 !h-12 after:!text-xl hidden md:flex hover:bg-white/10 rounded-full transition">
            </div>
            <div
                class="swiper-button-prev !text-white !w-12 !h-12 after:!text-xl hidden md:flex hover:bg-white/10 rounded-full transition">
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- 2. QUICK LINKS GRID -->
    <section class="relative z-30 container mx-auto px-6 -mt-10 md:-mt-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

            <a href="{{route('manutencao')}}"
                class="bg-white p-6 rounded-2xl shadow-xl flex flex-col items-center text-center border-b-4 border-blue-900 hover:-translate-y-2 transition duration-300">
                <div class="w-12 h-12 bg-blue-50 text-blue-900 rounded-full flex items-center justify-center mb-3"><i
                        data-lucide="graduation-cap"></i></div>
                <span class="text-xs font-black uppercase text-blue-900">Graduação</span>
                <span class="text-[10px] text-slate-500 mt-1 uppercase tracking-tighter">Edital 2026</span>
            </a>

            <a href="{{route('manutencao')}}"
                class="bg-white p-6 rounded-2xl shadow-xl flex flex-col items-center text-center border-b-4 border-blue-900 hover:-translate-y-2 transition duration-300">
                <div class="w-12 h-12 bg-blue-50 text-blue-900 rounded-full flex items-center justify-center mb-3"><i
                        data-lucide="contact-2"></i></div>
                <span class="text-xs font-black uppercase text-blue-900">Candidatura</span>
                <span class="text-[10px] text-slate-500 mt-1">Mobilidade Funcionários</span>
            </a>

            <a href="{{route('manutencao')}}"
                class="bg-white p-6 rounded-2xl shadow-xl flex flex-col items-center text-center border-b-4 border-cyan-500 hover:-translate-y-2 transition duration-300">
                <div class="w-12 h-12 bg-cyan-50 text-cyan-700 rounded-full flex items-center justify-center mb-3"><i
                        data-lucide="monitor"></i></div>
                <span class="text-xs font-black uppercase text-cyan-800 tracking-tight">Educação EaD</span>
                <span class="text-[10px] text-slate-500 mt-1 uppercase">Resultados Admissão</span>
            </a>

            <a href="{{route('manutencao')}}"
                class="bg-white p-6 rounded-2xl shadow-xl flex flex-col items-center text-center border-b-4 border-cyan-500 hover:-translate-y-2 transition duration-300">
                <div class="w-12 h-12 bg-cyan-50 text-cyan-700 rounded-full flex items-center justify-center mb-3"><i
                        data-lucide="clipboard-list"></i></div>
                <span class="text-xs font-black uppercase text-cyan-800">Inscritos EaD</span>
                <span class="text-[10px] text-slate-500 mt-1">Lista de Candidatos</span>
            </a>

        </div>
    </section>

    <!-- 3. IDENTIDADE (Missão/Visão/Valores) -->
    <section class="py-24 container mx-auto px-6">
        <div class="grid lg:grid-cols-3 gap-8">
            <div
                class="bg-white p-8 rounded-3xl border border-slate-100 hover:border-blue-500 transition-all group relative overflow-hidden">
                <i data-lucide="target"
                    class="absolute -top-4 -right-4 w-24 h-24 opacity-5 text-slate-900 group-hover:scale-110 transition"></i>
                <h3 class="text-2xl font-black text-blue-900 mb-4 italic uppercase">Missão</h3>
                <p class="text-slate-600 leading-relaxed text-sm text-justify font-medium uppercase tracking-tight italic">
                    Formar técnicos superiores com qualidade de modo a que contribuam de forma criativa para um
                    desenvolvimento económico sociocultural sustentável.</p>
            </div>
            <div class="bg-blue-900 p-8 rounded-3xl text-white shadow-2xl relative overflow-hidden">
                <h3 class="text-2xl font-black text-orange-400 mb-4 italic uppercase">Visão</h3>
                <p class="text-blue-100 leading-relaxed text-sm text-justify italic font-medium">Ser uma instituição de
                    ensino superior de qualidade e excelência no processo de ensino e aprendizagem a nível nacional e
                    internacional.</p>
            </div>
            <div class="bg-white p-8 rounded-3xl border border-slate-100 italic">
                <h3 class="text-2xl font-black text-blue-900 mb-4 uppercase italic">Valores</h3>
                <div class="flex flex-wrap gap-2 uppercase text-[10px] font-bold italic">
                    <span class="bg-slate-100 px-3 py-1 rounded-full">Excelência</span>
                    <span class="bg-slate-100 px-3 py-1 rounded-full">Integridade</span>
                    <span class="bg-slate-100 px-3 py-1 rounded-full">Laicidade</span>
                    <span
                        class="bg-slate-100 px-3 py-1 rounded-full border border-orange-200 text-orange-600">Inovação</span>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. ESTATÍSTICAS -->
    <section class="py-20 bg-[#00225a] text-white">
        <div class="container mx-auto px-6 grid md:grid-cols-3 gap-12 text-center">
            <div>
                <div class="text-6xl font-black text-orange-400 mb-2 italic">16k+</div>
                <div class="text-xs font-bold uppercase tracking-[0.2em] text-blue-200">Estudantes Efectivos</div>
            </div>
            <div>
                <div class="text-6xl font-black text-cyan-400 mb-2 italic">785</div>
                <div class="text-xs font-bold uppercase tracking-[0.2em] text-blue-200">Corpo Docente e CTA</div>
            </div>
            <div>
                <div class="text-6xl font-black text-white mb-2 italic">53</div>
                <div class="text-xs font-bold uppercase tracking-[0.2em] text-blue-200">Cursos de Graduação</div>
            </div>
        </div>
    </section>

    <!-- 5. NOTÍCIAS E REITORIA -->
    <section class="py-24 container mx-auto px-6 grid lg:grid-cols-3 gap-16">
        <!-- Notícias (Simulação do Layout original) -->
        <div class="lg:col-span-2">
            <h2
                class="text-2xl font-black text-blue-900 mb-10 uppercase italic border-l-4 border-orange-500 pl-4 tracking-tight">
                Últimas Notícias</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <article class="group cursor-pointer">
                    <div class="relative overflow-hidden rounded-2xl aspect-video mb-4">
                        <img src="{{ asset('images/038c51e1f38fa57e871ac71cf91cebf6.png') }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span
                            class="absolute top-4 left-4 bg-blue-600 text-white text-[10px] font-bold px-2 py-1 rounded uppercase">Matemática</span>
                    </div>
                    <h3 class="font-bold text-blue-900 leading-tight group-hover:text-orange-500 transition">Alusivo ao Dia
                        Internacional da Matemática, ISTLT realiza palestra...</h3>
                    <p class="text-xs text-slate-500 mt-2 flex items-center gap-1"><i data-lucide="calendar"
                            class="w-3 h-3"></i> 19 Março 2025</p>
                </article>
                <article class="group cursor-pointer">
                    <div class="relative overflow-hidden rounded-2xl aspect-video mb-4">
                        <img src="{{ asset('images/c7ca587367a16f55353a2749458b9234.png') }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span
                            class="absolute top-4 left-4 bg-red-600 text-white text-[10px] font-bold px-2 py-1 rounded uppercase">Governação</span>
                    </div>
                    <h3 class="font-bold text-blue-900 leading-tight group-hover:text-orange-500 transition">ISTLT realizou
                        a Aula Inaugural sob o Tema: Governação e Paz...</h3>
                    <p class="text-xs text-slate-500 mt-2 flex items-center gap-1"><i data-lucide="calendar"
                            class="w-3 h-3"></i> 15 Março 2025</p>
                </article>
            </div>
        </div>

        <!-- Reitoria (Gabinete) -->
        <div class="space-y-10">
            <h2 class="text-2xl font-black text-blue-900 mb-10 uppercase italic text-center">Gabinete da Reitoria</h2>
            <div class="flex flex-col items-center text-center">
                <div class="w-40 h-40 rounded-full border-4 border-blue-900 overflow-hidden mb-4 shadow-xl">
                    <img src="{{ asset('images/mr-unirovuma-2.jpg') }}" class="w-full h-full object-cover">
                </div>
                <h4 class="text-xs font-black uppercase text-blue-900 leading-tight">Prof. Doutor Mário Jorge Brito dos
                    Santos</h4>
                <span class="text-[10px] font-bold text-orange-600 uppercase tracking-widest mt-1">Reitor</span>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="flex flex-col items-center text-center">
                    <div class="w-24 h-24 rounded-full border-2 border-cyan-500 overflow-hidden mb-2">
                        <img src="{{ asset('images/vice-academico.jpg') }}" class="w-full h-full object-cover">
                    </div>
                    <h4 class="text-[9px] font-bold uppercase text-blue-900 leading-none">Prof. Doutor Ibraimo Hassane
                        Mussagy</h4>
                    <span class="text-[8px] font-bold text-cyan-600 uppercase mt-1">Vice-Reitor Académico</span>
                </div>
                <div class="flex flex-col items-center text-center">
                    <div class="w-24 h-24 rounded-full border-2 border-orange-500 overflow-hidden mb-2">
                        <img src="{{ asset('images/vice-reitor-administrativo.fw.png') }}"
                            class="w-full h-full object-cover">
                    </div>
                    <h4 class="text-[9px] font-bold uppercase text-blue-900 leading-none">Prof. Doutor José dos Santos
                        Baptista</h4>
                    <span class="text-[8px] font-bold text-orange-600 uppercase mt-1">Vice-Reitor Administrativo</span>
                </div>
            </div>
        </div>
    </section>
    <!-- SEÇÃO DE NOTÍCIAS E EVENTOS -->
    <section class="py-24 container mx-auto px-6 grid lg:grid-cols-3 gap-12" x-data="{ eventFilter: 'all' }">

        <!-- COLUNA DE NOTÍCIAS (2/3 da largura) -->
        <div class="lg:col-span-2">
            <div class="flex items-center justify-between mb-10 border-l-4 border-orange-500 pl-4">
                <h2 class="text-2xl font-black text-blue-900 uppercase italic tracking-tight">Notícias Dinâmicas</h2>
                <a href="{{route('manutencao')}}"
                    class="text-xs font-bold text-orange-600 hover:text-blue-900 transition flex items-center gap-1 uppercase">Ver
                    Todas <i data-lucide="chevron-right" class="w-4 h-4"></i></a>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Notícia 1: Matemática -->
                <article
                    class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden group hover:shadow-xl transition-all duration-500">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/038c51e1f38fa57e871ac71cf91cebf6.png') }}" alt="Matemática"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <span
                            class="absolute top-4 left-4 bg-sky-500 text-white text-[10px] font-black px-3 py-1.5 rounded-full uppercase tracking-widest shadow-lg">Notícias</span>
                    </div>
                    <div class="p-6">
                        <h3
                            class="text-lg font-bold text-blue-900 leading-snug group-hover:text-orange-500 transition-colors italic">
                            Alusivo ao Dia Internacional da Matemática, o ISTLT realizou uma palestra sobre os desafios na
                            aprendizagem...
                        </h3>
                        <div
                            class="mt-6 flex flex-wrap items-center gap-4 text-[10px] text-slate-500 border-t pt-4 font-bold uppercase tracking-tighter">
                            <span class="flex items-center gap-1.5"><i data-lucide="calendar"
                                    class="w-3.5 h-3.5 text-orange-500"></i> 19 Março 2025</span>
                            <span class="flex items-center gap-1.5"><i data-lucide="user"
                                    class="w-3.5 h-3.5 text-orange-500"></i> Bruno Gamito</span>
                            <span class="flex items-center gap-1.5 ml-auto"><i data-lucide="eye" class="w-3.5 h-3.5"></i>
                                2508</span>
                        </div>
                    </div>
                </article>

                <!-- Notícia 2: Aula Inaugural -->
                <article
                    class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden group hover:shadow-xl transition-all duration-500">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/c7ca587367a16f55353a2749458b9234.png') }}" alt="Aula Inaugural"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <span
                            class="absolute top-4 left-4 bg-red-600 text-white text-[10px] font-black px-3 py-1.5 rounded-full uppercase tracking-widest shadow-lg">Notícias</span>
                    </div>
                    <div class="p-6">
                        <h3
                            class="text-lg font-bold text-blue-900 leading-snug group-hover:text-orange-500 transition-colors italic">
                            O ISTLT realizou a Aula Inaugural do Ano Académico de 2025 sob o tema Governação, Paz e
                            Desenvolvimento...
                        </h3>
                        <div
                            class="mt-6 flex flex-wrap items-center gap-4 text-[10px] text-slate-500 border-t pt-4 font-bold uppercase tracking-tighter">
                            <span class="flex items-center gap-1.5"><i data-lucide="calendar"
                                    class="w-3.5 h-3.5 text-orange-500"></i> 15 Março 2025</span>
                            <span class="flex items-center gap-1.5"><i data-lucide="user"
                                    class="w-3.5 h-3.5 text-orange-500"></i> DTIC's</span>
                        </div>
                    </div>
                </article>
            </div>
        </div>

        <!-- COLUNA DE EVENTOS / PORTFÓLIO (1/3 da largura) -->
        <div class="space-y-8">
            <h2 class="text-2xl font-black text-blue-900 uppercase italic border-l-4 border-cyan-500 pl-4 tracking-tight">
                Próximos Eventos</h2>

            <div class="bg-slate-50 p-6 rounded-[2rem] border border-slate-100 italic shadow-inner">
                <!-- Filtros de Eventos -->
                <div class="flex flex-wrap gap-2 mb-8">
                    @php
                        $filters = [
                            ['id' => 'all', 'label' => 'Todos'],
                            ['id' => 'eventos', 'label' => 'Eventos'],
                            ['id' => 'infra', 'label' => 'Infra'],
                            ['id' => 'lab', 'label' => 'Labs'],
                            ['id' => 'pesquisa', 'label' => 'Pesquisa'],
                        ];
                    @endphp
                    @foreach ($filters as $f)
                        <button @click="eventFilter = '{{ $f['id'] }}'"
                            :class="eventFilter === '{{ $f['id'] }}' ? 'bg-blue-900 text-white shadow-lg' :
                                'bg-white text-slate-600 hover:bg-slate-200'"
                            class="px-4 py-2 rounded-full text-[10px] font-bold uppercase transition-all duration-300">
                            {{ $f['label'] }}
                        </button>
                    @endforeach
                </div>

                <!-- Lista de Eventos (Cards) -->
                <div class="grid grid-cols-1 gap-4 overflow-y-auto max-h-[600px] pr-2 custom-scrollbar">

                    <!-- Honoris Causa -->
                    <div x-show="eventFilter === 'all' || eventFilter === 'eventos'"
                        class="group relative bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition">
                        <img src="{{ asset('images/A UniRovuma curva-se a Isaura Nyusi e torna-se na terceira Honoris Causa por esta instituicao_600x600.png') }}"
                            class="w-full h-32 object-cover">
                        <div class="p-4">
                            <h4
                                class="text-xs font-black text-blue-900 uppercase italic leading-tight group-hover:text-orange-500 transition">
                                Honoris Causa à Isaura Nyusi</h4>
                            <span class="text-[9px] text-slate-400 font-bold uppercase">Eventos</span>
                        </div>
                    </div>

                    <!-- Lab Geologia -->
                    <div x-show="eventFilter === 'all' || eventFilter === 'lab'"
                        class="group relative bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition">
                        <img src="{{ asset('images/Laboratorio de Geologia-1_600x600.jpg') }}"
                            class="w-full h-32 object-cover">
                        <div class="p-4">
                            <h4
                                class="text-xs font-black text-blue-900 uppercase italic leading-tight group-hover:text-orange-500 transition">
                                Laboratório de Geologia - Napipine</h4>
                            <span class="text-[9px] text-slate-400 font-bold uppercase">Laboratórios</span>
                        </div>
                    </div>

                    <!-- Visita Malawi -->
                    <div x-show="eventFilter === 'all' || eventFilter === 'eventos'"
                        class="group relative bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition">
                        <img src="{{ asset('images/UNIMA-MALAWI-UNIROVUMA-3_600x600.jpg') }}"
                            class="w-full h-32 object-cover">
                        <div class="p-4">
                            <h4
                                class="text-xs font-black text-blue-900 uppercase italic leading-tight group-hover:text-orange-500 transition">
                                Reitor visita Univ. do Malawi</h4>
                            <span class="text-[9px] text-slate-400 font-bold uppercase">Eventos</span>
                        </div>
                    </div>

                    <!-- Pesquisa -->
                    <div x-show="eventFilter === 'all' || eventFilter === 'pesquisa'"
                        class="group relative bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition">
                        <img src="{{ asset('images/pesquisa-isdrb-lichinga_600x600.jpg') }}"
                            class="w-full h-32 object-cover">
                        <div class="p-4">
                            <h4
                                class="text-xs font-black text-blue-900 uppercase italic leading-tight group-hover:text-orange-500 transition">
                                Demonstração Científica ISDRB</h4>
                            <span class="text-[9px] text-slate-400 font-bold uppercase">Pesquisa</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <style>
        /* Estilização da barra de rolagem dos eventos */
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #ff8a00;
        }
    </style>

    <!-- 6. PARCEIROS (Marquee Infinito) -->
    <section class="py-16 bg-white border-y border-slate-100 overflow-hidden">
        <div class="container mx-auto px-6 mb-10">
            <h4 class="text-center text-slate-400 font-bold text-xs uppercase tracking-[0.3em]">Parceiros Institucionais
            </h4>
        </div>
        <div class="relative flex overflow-hidden group">
            <div class="animate-marquee flex items-center space-x-16 py-4">
                <!-- Logos -->
                <img src="{{ asset('images/huawei-logo.png') }}" class="h-10 partner-logo">
                <img src="{{ asset('images/up-maputo.png') }}" class="h-10 partner-logo">
                <img src="{{ asset('images/instituto-de-camoes.fw.png') }}" class="h-10 partner-logo">
                <img src="{{ asset('images/universitat-leipzig.fw.png') }}" class="h-10 partner-logo">
                <!-- Duplicar para o loop infinito -->
                <img src="{{ asset('images/huawei-logo.png') }}" class="h-10 partner-logo">
                <img src="{{ asset('images/up-maputo.png') }}" class="h-10 partner-logo">
                <img src="{{ asset('images/instituto-de-camoes.fw.png') }}" class="h-10 partner-logo">
                <img src="{{ asset('images/universitat-leipzig.fw.png') }}" class="h-10 partner-logo">
                <img src="{{ asset('images/huawei-logo.png') }}" class="h-10 partner-logo">
                <img src="{{ asset('images/up-maputo.png') }}" class="h-10 partner-logo">
                <img src="{{ asset('images/instituto-de-camoes.fw.png') }}" class="h-10 partner-logo">
                <img src="{{ asset('images/universitat-leipzig.fw.png') }}" class="h-10 partner-logo">
                <img src="{{ asset('images/huawei-logo.png') }}" class="h-10 partner-logo">
                <img src="{{ asset('images/up-maputo.png') }}" class="h-10 partner-logo">
                <img src="{{ asset('images/instituto-de-camoes.fw.png') }}" class="h-10 partner-logo">
                <img src="{{ asset('images/universitat-leipzig.fw.png') }}" class="h-10 partner-logo">
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
        });
    </script>
@endpush
