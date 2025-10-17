<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'location',
        'booking_datetime', 'service',
        'additional_info', 'consultation_fee','payment_status'
    ];


public function invoice()
{
    return $this->hasOne(\App\Models\Invoice::class);
}
}
