<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
    // Mostra o formulário de login
    public function showLoginForm() {
        return view('EaD.candidatura.login');
    }

    // Processa o login
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Procura o admin na tabela 'users'
        $user = DB::table('users')->where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Guarda a sessão do admin
            session(['admin_logged' => true, 'admin_name' => $user->name]);
            return redirect()->route('candidatura.gestao');
        }

        return back()->withErrors(['email' => 'Credenciais inválidas.'])->withInput();
    }

    // Termina a sessão
    public function logout(Request $request) {
        session()->forget(['admin_logged', 'admin_name']);
        return redirect()->route('admin.login');
    }
}