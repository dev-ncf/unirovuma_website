@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-12 px-4">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl border border-slate-200/80 p-8">
        
        <div class="text-center mb-8">
            <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold px-3 py-1 rounded-full uppercase">Painel Restrito</span>
            <h2 class="text-2xl font-bold text-slate-900 mt-3">Administração EaD</h2>
            <p class="text-xs text-slate-500 mt-1">Insira as suas credenciais para gerir as candidaturas.</p>
        </div>

        @if($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-3 mb-6 rounded text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-amber-50 border-l-4 border-amber-500 text-amber-700 p-3 mb-6 rounded text-sm">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-5">
            @csrf
            
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Email de Acesso</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full border rounded-xl px-4 py-2.5 outline-none focus:ring-2 focus:ring-emerald-500 text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Palavra-passe</label>
                <input type="password" name="password" required class="w-full border rounded-xl px-4 py-2.5 outline-none focus:ring-2 focus:ring-emerald-500 text-sm">
            </div>

            <button type="submit" class="w-full bg-emerald-800 hover:bg-emerald-900 text-white font-bold py-3 px-4 rounded-xl transition shadow-lg shadow-emerald-900/20 text-sm">
                Entrar no Sistema
            </button>
        </form>

        <div class="mt-6 text-center">
            <a href="{{ route('candidatura.index') }}" class="text-xs font-medium text-slate-500 hover:text-slate-800 transition">
                &larr; Voltar ao Portal Público
            </a>
        </div>
    </div>
</div>
@endsection