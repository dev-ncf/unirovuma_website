<?php

namespace App\Providers;

use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\View\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
         FilamentView::registerRenderHook(
            PanelsRenderHook::AUTH_LOGIN_FORM_BEFORE,
            function (): ?View {
                // Verifica se o URL atual contém 'login'
                if (request()->routeIs('filament.admin.auth.login') || request()->is('*/login')) {
                    return view('filament.login-logo');
                }
                return null;
            },
        );
    }
}
