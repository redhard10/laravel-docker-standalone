<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\LivewireServiceProvider as BaseLivewireServiceProvider;

class LivewireServiceProvider extends BaseLivewireServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\Illuminate\Contracts\View\Factory::class, \Illuminate\View\Factory::class);
        $this->app->bind(\Illuminate\Html\Builder::class, \Illuminate\Html\HtmlBuilder::class);

        parent::register();
    }

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadHelper(__DIR__.'/../Helpers');

        // Definición de componentes...
        $this->components([
            'customer' => \App\Http\Livewire\Panel::class,
        ]);
    }
}