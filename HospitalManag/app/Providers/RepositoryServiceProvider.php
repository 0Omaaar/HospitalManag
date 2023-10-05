<?php

namespace App\Providers;

use App\Http\Interfaces\Ambulances\AmbulanceRepositoryInterface;
use App\Http\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Http\Interfaces\Insurances\InsuranceRepositoryInterface;
use App\Http\Interfaces\Sections\SectionRepositoryInterface;
use App\Http\Interfaces\Service\SingleServiceRepositoryInterface;
use App\Http\Repository\Ambulances\AmbulanceRepository;
use App\Http\Repository\Doctors\DoctorRepository;
use App\Http\Repository\Insurances\InsuranceRepository;
use App\Http\Repository\Sections\SectionRepository;
use App\Http\Repository\Service\SingleServiceRepository;
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
        $this->app->bind(SingleServiceRepositoryInterface::class, SingleServiceRepository::class);
        $this->app->bind(InsuranceRepositoryInterface::class, InsuranceRepository::class);
        $this->app->bind(AmbulanceRepositoryInterface::class, AmbulanceRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
