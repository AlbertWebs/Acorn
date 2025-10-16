<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'step_number',
        'title',
        'description',
        'image_one',
        'image_two',
        'order',
    ];
}
