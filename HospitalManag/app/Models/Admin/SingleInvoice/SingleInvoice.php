<?php

namespace App\Models\Admin\SingleInvoice;

use App\Models\Admin\Section;
use App\Models\Admin\Service;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SingleInvoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function service()
    {
        return $this->belongsTo(Service::class,'service_id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }
}
