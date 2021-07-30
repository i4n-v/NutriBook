<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function nutriPatients() {
        $nutri = Auth::user()->nutritionistProfile;
        $nutri_patients = $nutri->eatingPlans->map(function($ep) {
            return $ep->patient->user->id;
        });
        $patient_query = \App\Models\User::with('patientProfile')->whereIn('id', $nutri_patients)->orderBy('name', 'asc')->get()->append('formattedCPF');
    return $patient_query->toJson();
    }
}
