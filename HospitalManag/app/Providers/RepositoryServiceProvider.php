<?php

namespace App\Providers;

use App\Http\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Http\Interfaces\Sections\SectionRepositoryInterface;
use App\Http\Repository\Doctors\DoctorRepository;
use App\Http\Repository\Sections\SectionRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(SectionRepositoryInterface::class, SectionRepository::class);
        $this->app->bind(DoctorRepositoryInterface::class, DoctorRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
