<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EatingPlan extends Pivot
{
    use HasFactory;
    protected $table = 'eating_plans';
    public $incrementing = true;
    protected $fillable = [
        'date_start',
        'date_finish',
        'title',
        'nutritionist_id',
        'patient_id',
   ];

    protected $appends = [
        'formatted_date_start',
        'formatted_date_finish',
    ];

    public function nutritionist(){
        return $this->belongsTo(Nutritionist::class);
    }

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function meals() {
        return $this->hasMany(Meal::class, 'eating_plan_id');
    }

    public function getFormattedDateStartAttribute() {
        $date_start = $this->date_start;
        $date_start_parts = explode('-', $date_start);
        $date_start_reverse = array_reverse($date_start_parts);
        return implode('/', $date_start_reverse);
    }

    public function getFormattedDateFinishAttribute() {
        $date_finish = $this->date_finish;
        $date_finish_parts = explode('-', $date_finish);
        $date_finish_reverse = array_reverse($date_finish_parts);
        return implode('/', $date_finish_reverse);
    }
}
