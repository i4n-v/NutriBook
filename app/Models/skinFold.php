<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skinFold extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'breastplate', //peitoral
        'biceps',
        'triceps',
        'abdominal',
        'subscapular',
        'suprailiaco',
        'middle_axillary', //axilar médio
        'thigh', //coxa
        'calf', //panturilha
        'lumbar', //lombar
        'evaluation_id'
    ];
}
