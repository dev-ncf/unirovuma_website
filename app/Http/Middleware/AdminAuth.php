<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth {
    public function handle(Request $request, Closure $next): Response {
        if (!session('admin_logged')) {
            return redirect()->route('admin.login')->with('error', 'Por favor, faça login primeiro.');
        }
        return $next($request);
    }
}