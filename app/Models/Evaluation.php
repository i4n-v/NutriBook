<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Evaluation extends Pivot
{
    use HasFactory;

    protected $table = 'evaluations';
    public $incrementing = true;
    protected $fillable = [
        'weight',
        'height',
        'nutritionist_id',
        'patient_id',
    ];

    public function nutritionist(){
        return $this->belongsTo(Nutritionist::class);
    }

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function skinFold(){
        return $this->hasOne(SkinFold::class, 'evaluation_id');
    }

    public function bodyMeasurement(){
        return $this->hasOne(BodyMeasurement::class, 'evaluation_id');
    }

    public function anamnese(){
        return $this->hasOne(Anamnese::class, 'evaluation_id');
    }

    
}
