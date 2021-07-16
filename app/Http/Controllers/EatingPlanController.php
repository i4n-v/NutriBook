<?php

namespace App\Http\Controllers;

use App\Models\EatingPlan;
use App\Models\User;
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
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EatingPlan  $eatingPlan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user)
    {
        return redirect()->route('home', ['patient' => $user->patientProfile]);
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

        $patient = $eatingplan->patient;
        $eatingplan->delete();

         return redirect()
         ->route('home', ['patient' => $patient])
         ->with('success', 'Avaliação atualizada com sucesso!');

    }
}
