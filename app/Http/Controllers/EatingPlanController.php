<?php

namespace App\Http\Controllers;

use App\Models\EatingPlan;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class EatingPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Patient $patient)
    {
        return view('components/eating-plan-action', ['patient' => $patient]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Patient $patient)
    {
        $eatingPlan = EatingPlan::create([
            'title' => $request->title,
            'date_start' => $request->date_start,
            'date_finish' => $request->date_finish,
            'nutritionist_id' => auth()->user()->nutritionistProfile->id,
            'patient_id' => $patient->id,
        ]);

        return $eatingPlan;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EatingPlan  $eatingPlan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user)
    {
        return view('home', ['patient' => $user->patientProfile]);
    }

    public function eatingPlansData(Request $request, User $user)
    {
        if (Auth::user()->isPatient()) {
            $eating_plan_collection = EatingPlan::where('patient_id', Auth::user()->patientProfile->id)->orderBy('title', 'asc')->get();
        } else {
            $eating_plan_collection = EatingPlan::where('patient_id', $user->patientProfile->id)->where('nutritionist_id', Auth::user()->nutritionistProfile->id)->orderBy('title', 'asc')->get();
        }
        return $eating_plan_collection->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EatingPlan  $eatingPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(EatingPlan $eatingPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EatingPlan  $eatingPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EatingPlan $eatingPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EatingPlan  $eatingPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(EatingPlan $eatingplan)
    {
        if ($eatingplan->nutritionist->user != auth()->user()) {
            return response('', 403);
        }
        $patient = $eatingplan->patient;
        $eatingplan->delete();

         return redirect()
         ->route('eating_plan', $patient->user)
         ->with('success', 'Plano alimentar excluido com sucesso!');

    }
}
