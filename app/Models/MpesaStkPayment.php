<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MpesaStkPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'booking_id',
        'phone_number',
        'amount',
        'merchant_request_id',
        'checkout_request_id',
        'result_code',
        'result_desc',
        'mpesa_receipt_number',
        'transaction_date',
        'status', // pending, success, failed
        'raw_response',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
