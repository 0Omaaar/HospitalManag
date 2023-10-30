<?php

namespace App\Http\Interfaces\doctor_dashboard;

interface DoctorInvoicesRepositoryInterface
{
    public function index();
    public function completed_invoices();
    public function review_invoices();
}
