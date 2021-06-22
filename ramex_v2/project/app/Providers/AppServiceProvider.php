<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use ConsoleTVs\Charts\Registrar as Charts;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Charts $charts)
    {
        $charts->register([
            \App\Charts\RamassageChart::class
        ]);
        $charts->register([
            \App\Charts\ClientsAvecZeroRamChart::class
        ]);
        $charts->register([
            \App\Charts\ClientsAvecZeroRamPourcentageChart::class
        ]);
        $charts->register([
            \App\Charts\ClientsAvec35RamChart::class
        ]);
        $charts->register([
            \App\Charts\ClientsAvec35RamPourcentageChart::class
        ]);
        $charts->register([
            \App\Charts\PassageChart::class
        ]);
    }
}
