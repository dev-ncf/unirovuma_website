@extends('layouts.app')

@section('content')
    <div class="min-h-[calc(100vh-80px)] bg-gray-100 flex items-center justify-center px-4 py-10">

        <main class="w-full max-w-xl text-center">

            <div class="bg-white rounded-xl shadow-lg border-t-8 border-blue-900 p-6 sm:p-10">

                {{-- Logo --}}
                <div class="flex justify-center mb-6">
                    <img src="{{ asset('images/logotipo-unirovuma.png') }}" alt="Universidade Rovuma"
                        class="w-auto max-w-[180px] h-auto">
                </div>

                {{-- Estado --}}
                <div class="mb-6">
                    <span
                        class="inline-block bg-yellow-400 text-black
                               px-4 py-2 rounded-full
                               text-xs sm:text-sm font-bold
                               uppercase tracking-wide">
                        Em manutenção
                    </span>
                </div>

                {{-- Loader --}}
                <div class="flex justify-center mb-6">
                    <div class="w-10 h-10
                               border-4 border-gray-200
                               border-t-blue-900
                               rounded-full animate-spin"
                        role="status" aria-label="A carregar"></div>
                </div>

                {{-- Título --}}
                <h1 class="text-2xl sm:text-3xl font-bold text-blue-900 mb-4">
                    Estamos a realizar uma manutenção
                </h1>

                {{-- Descrição --}}
                <p class="text-gray-600 text-base sm:text-lg leading-relaxed mb-6">
                    O portal da Universidade Rovuma encontra-se temporariamente
                    indisponível para manutenção e melhorias.
                    Pedimos desculpas pelo inconveniente.
                </p>

                <p class="text-gray-500 text-sm mb-6">
                    Voltaremos a estar disponíveis brevemente.
                </p>

                {{-- Contactos --}}
                <div class="border-t border-gray-200 pt-5 text-sm text-gray-500">

                    <p>
                        Universidade Rovuma
                    </p>

                  
                </div>

            </div>

            {{-- Copyright --}}
            <p class="mt-5 text-xs text-gray-400">
                &copy; {{ date('Y') }} Universidade Rovuma.
                Todos os direitos reservados.
            </p>

        </main>

    </div>
@endsection
