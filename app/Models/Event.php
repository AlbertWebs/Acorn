<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'author',
        'excerpt',
        'content',
        'featured_image',
        'is_published',
        'price',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($event) {
            $event->slug = Str::slug($event->title);
        });
    }

    public function getIsFreeAttribute(): bool
    {
        return is_null($this->price) || (float)$this->price <= 0;
    }
}


