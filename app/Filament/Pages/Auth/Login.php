<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\Login as BaseLogin;
use Illuminate\Contracts\Support\Htmlable;

class Login extends BaseLogin
{
    // Substitui o texto "Sign In" padrão por um título institucional limpo ou vazio
    public function getHeading(): string | Htmlable
    {
        return '';
    }
}