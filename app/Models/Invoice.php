<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $casts = [
        'invoice_date' => 'datetime',
        'due_date' => 'datetime',
    ];

    protected $fillable = [
        'booking_id', // change from appointment_id if using Booking
        'user_id',
        'consultant_id',
        'client_name',
        'client_email',
        'client_phone',
        'invoice_number',
        'invoice_date',
        'due_date',
        'service_type',
        'hours',
        'rate_per_hour',
        'subtotal',
        'tax_amount',
        'total_amount',
        'payment_method',
        'payment_status',
        'transaction_reference',
        'status',
    ];

    // Relationships
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function consultant()
    {
        return $this->belongsTo(User::class, 'consultant_id');
    }
}

