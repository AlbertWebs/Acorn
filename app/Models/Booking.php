<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'user_id',
        'pickup_datetime',
        'dropoff_datetime',
        'pickup_location',
        'dropoff_location',
        'status',
        'total_price',
        'notes',
        'invoice_id',        // Link to invoice
        'payment_reference', // Optional (e.g., M-Pesa or Smile ID)
        'callback_data',     // Optional (for Smile ID or payment gateway JSON data)
    ];

    protected $casts = [
        'pickup_datetime' => 'datetime',
        'dropoff_datetime' => 'datetime',
        'callback_data' => 'array',
    ];

    // Relationships
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    // Scopes
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    // Utility Methods
    public function markAsConfirmed($reference = null)
    {
        $this->update([
            'status' => 'confirmed',
            'payment_reference' => $reference,
        ]);
    }

    public function markAsCompleted()
    {
        $this->update(['status' => 'completed']);
    }
}
