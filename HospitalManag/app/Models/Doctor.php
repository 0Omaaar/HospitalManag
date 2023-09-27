<?php

namespace App\Models;

use App\Models\Admin\Appointment;
use App\Models\Admin\Image;
use App\Models\Admin\Section;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    public $fillable = ['name', 'email', 'email_verified_at', 'password', 'phone', 'section_id', 'status', 'number_of_statements'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function doctorappointments()
    {
        return $this->belongsToMany(Appointment::class,'appointment_doctor');
    }
}