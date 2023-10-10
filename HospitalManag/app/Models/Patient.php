<?php

namespace App\Models;

use App\Models\Admin\Finance\ReceiptAccount;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    public $fillable= ['name', 'address', 'email','password','date_birth','phone','gender','blood_group'];

    public function receipts(){
        return $this->hasMany(ReceiptAccount::class);
    }
}
