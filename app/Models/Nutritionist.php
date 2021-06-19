<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Nutritionist extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'CPF',
        'CRN',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function patients() {
        return $this->belongsToMany(Patient::class, 'evaluations', 'nutritionist_id', 'patient_id')->using(Evaluation::class)->as('evaluation')->withPivot('id', 'weight', 'height', 'lean_mass', 'body_fat'); 
    }
    public function meals(){
        return $this->hasMany(Meal::class,'nutritionist_id');
    }
    public function patient() {
        return $this->belongsToMany(Patient::class, 'eating_plans','nutritionist_id' , 'patient_id')->using(EatingPlan::class)->as('eatingplans')->withPivot('id', 'date_start','date_finish'); 
    }

}
