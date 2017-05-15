<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\ViewComposers\CuentasComposer;


class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['admin.cuentas.create','admin.ingresos_cuentas.create'],'App\Http\ViewComposers\CuentasComposer');

        View::composer(['admin.creditos.create'],'App\Http\ViewComposers\CreditosComposer');

        View::composer(['admin.movi_creditos.index'],'App\Http\ViewComposers\MovimientosCreditoComposer');
        View::composer(['admin.creditos.show'],'App\Http\ViewComposers\MovimientosCreditoComposer');
    
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
