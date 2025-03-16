<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {
        Carbon::setLocale('id'); // Pastikan Carbon menggunakan bahasa Indonesia
        setlocale(LC_TIME, 'id_ID.UTF-8'); // Mengatur locale sistem
    }
}
