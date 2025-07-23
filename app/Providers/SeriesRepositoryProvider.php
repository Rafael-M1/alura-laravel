<?php

namespace App\Providers;

use App\Http\Repositories\EloquentSeriesRepository;
use App\Http\Repositories\SeriesRepository;
use Illuminate\Support\ServiceProvider;

class SeriesRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Ensinar o service container o que tem de fazer, que liga uma interface a uma classe concreta
        $this->app->bind(SeriesRepository::class, EloquentSeriesRepository::class);
    }

}
