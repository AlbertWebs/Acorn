<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class C2bPayment extends Model
{
    use HasFactory;

    public $table = "mpesa_c2b_payments";

    protected $fillable = [
        'transaction_type',
        'trans_id',
        'trans_time',
        'amount',
        'business_short_code',
        'bill_ref_number',
        'invoice_number',
        'org_account_balance',
        'third_party_trans_id',
        'msisdn',
        'first_name',
        'middle_name',
        'last_name',
        'status',
        'raw_payload',
    ];

    protected $casts = [
        'raw_payload' => 'array',
        'trans_time' => 'datetime',
    ];
}
