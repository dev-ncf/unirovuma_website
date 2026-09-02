<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universidade Rovuma</title>

    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js (Para Dropdowns) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Swiper.js CSS (OBRIGATÓRIO PARA O CAROUSEL) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="shortcut icon" href="{{asset('/images/logotipo-unirovuma.png')}}" type="image/x-icon">

    <style>
        [x-cloak] { display: none !important; }
        
        /* Estilos customizados para Swiper */
        .swiper-pagination-bullet-active {
            background: #ff8a00 !important; /* Cor Laranja da UniRovuma */
        }
        .swiper-button-next, .swiper-button-prev {
            color: white !important;
        }

        /* Animação do Marquee de Parceiros */
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            display: flex;
            width: max-content;
            animation: marquee 30s linear infinite;
        }
    </style>
</head>
<body class="bg-[#fcfdfe] font-sans antialiased">

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- Swiper.js JS (OBRIGATÓRIO PARA O CAROUSEL) -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        // Inicializa ícones Lucide globalmente
        lucide.createIcons();
    </script>

    <!-- Onde o script de inicialização do carrossel da Home será inserido -->
    @stack('scripts')

</body>
</html>