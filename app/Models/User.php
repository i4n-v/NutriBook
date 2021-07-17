<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable implements MustVerifyEmail
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
        'phone',
        'location',
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

    public function profile(){
        return $this->isNutritionist() ? $this->nutritionistProfile : $this->patientProfile;
    }
    public function isPatient(){
        return $this->patientProfile != null;
    }

    public function isNutritionist(){
        return $this->nutritionistProfile != null;
    }

    public function patientProfile(){
        return $this->hasOne(Patient::class, 'user_id');
    }

    public function nutritionistProfile(){
        return $this->hasOne(Nutritionist::class, 'user_id');
    }    

}
