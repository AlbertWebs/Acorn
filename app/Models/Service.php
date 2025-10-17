<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'icon',
        'image',
        'short_description',
        'description',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'is_active',
    ];

    // Auto-generate slug when creating/updating
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($service) {
            $service->slug = Str::slug($service->title);
        });

        static::updating(function ($service) {
            $service->slug = Str::slug($service->title);
        });
    }
}
