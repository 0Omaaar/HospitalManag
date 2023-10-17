<?php

namespace App\Models\Admin\PatientAccount;

use App\Models\Admin\Finance\PaymentAccount;
use App\Models\Admin\Finance\ReceiptAccount;
use App\Models\Admin\SingleInvoice\SingleInvoice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientAccount extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function invoice()
    {
        return $this->belongsTo(SingleInvoice::class,'invoice_id');
    }

    public function ReceiptAccount()
    {
        return $this->belongsTo(ReceiptAccount::class,'receipt_id');
    }


    public function PaymentAccount()
    {
        return $this->belongsTo(PaymentAccount::class,'payment_id');
    }
}
