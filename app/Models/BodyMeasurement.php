<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BodyMeasurement extends Model
{
    use HasFactory;
    protected $fillable = [
        'bust', 
        'thorax',
        'waist',
        'hip', 
        'thigh',
        'calf',
        'evaluation_id', 
    ];

    public function evaluation(){
        return $this->belongsTo(Evaluation::class);
    }

}
