<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'paymentId', 'customer', 'value', 'paymentLink', 'billingType', 'status', 'invoiceUrl', 'invoiceNumber', 'bankSlipUrl', 'transactionReceiptUrl'
    ];

    public $incrementing = false;

    protected $casts = [
        'id' => 'string',
    ];
}
