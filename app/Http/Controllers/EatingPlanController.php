<?php

namespace App\Http\Controllers;

use App\Models\EatingPlan;
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
    public function show(Request $request)
    {
        return redirect("/home?eating_plan=$request->id");
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
       
         $eatingplan->delete();
         return redirect('/home?success=Plano alimentar excluido com sucesso!');
    }
}
