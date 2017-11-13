<?php

namespace Cinema\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(){
        // composer([listaDeVistasDondeMostrar], ClaseDeConsulta)
        view()->composer(['front.reviews'], 'Cinema\Http\ViewComposers\AsideComposer');
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
