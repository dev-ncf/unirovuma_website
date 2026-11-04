<?php

namespace App\Filament\Pages; // Ajuste para App\Filament\Admin\Pages se o seu ficheiro estiver lá

use Filament\Facades\Filament;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    /**
     * 1. Esconde o link "Dashboard" da barra lateral para utilizadores normais
     */
    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()?->hasRole('super_admin') ?? false;
    }

    /**
     * 2. Quando o utilizador entra em /admin:
     *    Se for super_admin -> Carrega o Dashboard normalmente.
     *    Se for outro papel -> Redireciona para o primeiro Resource a que tem permissão.
     */
    public function mount(): void
    {
        $user = auth()->user();

        // Se for super_admin, fica no Dashboard
        if ($user?->hasRole('super_admin')) {
            return;
        }

        // Percorre todos os Resources do sistema (Candidaturas, Users, etc.)
        foreach (Filament::getResources() as $resource) {
            // Verifica no Shield/Policy se este utilizador pode aceder a este Resource
            if ($resource::canViewAny()) {
                // Redireciona imediatamente para o primeiro que for permitido
                $this->redirect($resource::getUrl('index'));
                return;
            }
        }

        // Caso o utilizador não tenha permissão para absolutamente nada no sistema
        abort(403, 'A sua conta não tem permissão para aceder a nenhum módulo.');
    }
}