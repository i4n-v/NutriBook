<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Evaluation extends Pivot
{
    use HasFactory;

    protected $table = 'evaluations';

    protected $fillable = [
        'weight',
        'height',
        'lean_mass',
        'body_fat',
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
        return $this->hasOne(skinFold::class);
    }

    public function bodyMeasurement(){
        return $this->hasOne(BodyMeasurement::class);
    }

    public function anamnese(){
        return $this->hasOne(Anamnese::class);
    }

}
