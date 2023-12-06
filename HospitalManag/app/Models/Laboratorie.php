<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorie extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function invoice(){
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function patient(){
        return $this->belongsTo(Patient::class, 'patient_id');
    }

        public function employee(){
        return $this->belongsTo(LaboratorieEmployee::class, 'patient_id');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
