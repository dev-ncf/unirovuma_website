<footer class="bg-slate-900 text-white pt-16 pb-8">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
            
            <!-- Coluna 1: Sobre -->
            <div>
                <img src="{{ asset('images/logotipo-unirovuma.png') }}" alt="Logo" class="h-16 mb-6 ">
                <p class="text-slate-400 text-sm leading-relaxed mb-6">
                    A Universidade Rovuma é uma instituição pública focada na excelência acadêmica e no desenvolvimento sustentável da região Norte de Moçambique.
                </p>
                <div class="flex gap-4">
                    <a href="{{route('manutencao')}}" class="w-10 h-10 rounded-full">
                        <i data-lucide="facebook" class="w-5 h-5"></i>
                    </a>
                    <a href="{{route('manutencao')}}" class="w-10 h-10 rounded-full">
                        <i data-lucide="youtube" class="w-5 h-5"></i>
                    </a>
                    <a href="{{route('manutencao')}}" class="w-10 h-10 rounded-full">
                        <i data-lucide="instagram" class="w-5 h-5"></i>
                    </a>
                </div>
            </div>

            <!-- Coluna 2: Endereços (Extraído do código original) -->
            <div>
                <h4 class="text-orange-400 font-bold uppercase mb-6 flex items-center gap-2">
                    <i data-lucide="map-pin" class="w-5 h-5"></i> Onde Estamos
                </h4>
                <ul class="space-y-4 text-sm text-slate-400">
                    <li>
                        <strong class="text-white block">Reitoria (Nampula)</strong>
                        Av. Josina Machel nº 256
                    </li>
                    <li>
                        <strong class="text-white block">Niassa (Lichinga)</strong>
                        Campus de Nángala, Cidade de Lichinga
                    </li>
                    <li>
                        <strong class="text-white block">Cabo Delgado (Montepuez)</strong>
                        Campus de N'coripo
                    </li>
                </ul>
            </div>

            <!-- Coluna 3: Links Rápidos -->
            <div>
                <h4 class="text-orange-400 font-bold uppercase mb-6 flex items-center gap-2">
                    <i data-lucide="link" class="w-5 h-5"></i> Links Rápidos
                </h4>
                <ul class="space-y-2 text-sm text-slate-400">
                    <li><a href="{{route('manutencao')}}" class="hover:text-white transition flex items-center gap-2"><i data-lucide="chevron-right" class="w-3 h-3"></i> Admissão 2026</a></li>
                    <li><a href="{{route('manutencao')}}" class="hover:text-white transition flex items-center gap-2"><i data-lucide="chevron-right" class="w-3 h-3"></i> Editais e Documentos</a></li>
                    <li><a href="{{route('manutencao')}}" class="hover:text-white transition flex items-center gap-2"><i data-lucide="chevron-right" class="w-3 h-3"></i> Portal Académico</a></li>
                    <li><a href="{{route('manutencao')}}" class="hover:text-white transition flex items-center gap-2"><i data-lucide="chevron-right" class="w-3 h-3"></i> Biblioteca Digital</a></li>
                    <li><a href="{{route('manutencao')}}" class="hover:text-white transition flex items-center gap-2"><i data-lucide="chevron-right" class="w-3 h-3"></i> Calendário Académico</a></li>
                </ul>
            </div>

            <!-- Coluna 4: Newsletter/Boletim -->
            <div>
                <h4 class="text-orange-400 font-bold uppercase mb-6 flex items-center gap-2">
                    <i data-lucide="mail-check" class="w-5 h-5"></i> Informativo
                </h4>
                <p class="text-sm text-slate-400 mb-4">Receba as últimas notícias diretamente no seu e-mail.</p>
                <form class="flex flex-col gap-2">
                    <input type="email" placeholder="Seu e-mail" class="bg-slate-800 border-none rounded p-3 text-sm focus:ring-2 focus:ring-orange-500">
                    <button class="bg-orange-600 hover:bg-orange-700 font-bold py-2 rounded transition">Subscrever</button>
                </form>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center text-xs text-slate-500 gap-4">
            <p>Universidade Rovuma © 2015 - {{ date('Y') }}. Todos os direitos reservados.</p>
            <p class="flex items-center gap-1">Desenvolvido por <span class="text-white font-bold">DTIC's</span> <i data-lucide="code-2" class="w-4 h-4 text-orange-500"></i></p>
        </div>
    </div>
</footer>
