<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EatingPlan extends Pivot
{
    use HasFactory;
    protected $table = 'eating_plans';
    protected $fillable = [
        'date_start',
        'date_finish',
        'nutritionist_id',
        'patient_id',
   ];
   public function nutritionists(){
    return $this->belongsTo(Nutritionist::class);
    }
   public function patients(){
    return $this->belongsTo(Patient::class);
    }
}
