<?php

namespace App\Providers;

use App\Http\Interfaces\Ambulances\AmbulanceRepositoryInterface;
use App\Http\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Http\Interfaces\Finance\PaymentRepositoryInterface;
use App\Http\Interfaces\Insurances\InsuranceRepositoryInterface;
use App\Http\Interfaces\Patients\PatientRepositoryInterface;
use App\Http\Interfaces\Sections\SectionRepositoryInterface;
use App\Http\Interfaces\Service\SingleServiceRepositoryInterface;
use App\Http\Repository\Ambulances\AmbulanceRepository;
use App\Http\Repository\Doctors\DoctorRepository;
use App\Http\Repository\Finance\PaymentRepository;
use App\Http\Repository\Finance\ReceiptRepository;
use App\Http\Repository\Insurances\InsuranceRepository;
use App\Http\Repository\Patients\PatientRepository;
use App\Http\Repository\Sections\SectionRepository;
use App\Http\Repository\Service\SingleServiceRepository;
use App\Http\Interfaces\Finance\ReceiptRepositoryInterface;
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
        $this->app->bind(PatientRepositoryInterface::class, PatientRepository::class);
        $this->app->bind(ReceiptRepositoryInterface::class, ReceiptRepository::class);
        $this->app->bind(PaymentRepositoryInterface::class, PaymentRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
