<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'weight',
        'food',
        'sodium',
        'dietary_fiber',
        'trans_fat',
        'saturated_fat',
        'total_fat',
        'protein',
        'carbohydrate',
        'energetic value',
    ];
}
