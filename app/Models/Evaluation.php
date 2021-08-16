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

    protected $appends = [
        'formatted_created_at',
        'formatted_updated_at',
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

    public function getFormattedCreatedAtAttribute() {
        $created_at = $this->created_at->format('d-m-Y');
        $created_at_parts = explode('-', $created_at);
        $created_at_reverse = array_reverse($created_at_parts);
        return implode('/', $created_at_reverse);
    }

    public function getFormattedUpdatedAtAttribute() {
        $updated_at = $this->updated_at->format('d-m-Y');
        $updated_at_parts = explode('-', $updated_at);
        $updated_at_reverse = array_reverse($updated_at_parts);
        return implode('/', $updated_at_reverse);
    }
}
