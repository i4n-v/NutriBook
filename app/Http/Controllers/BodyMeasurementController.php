<?php

namespace App\Http\Controllers;

use App\Models\BodyMeasurement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class BodyMeasurementController extends Controller
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
        // $bodyMeasurement = BodyMeasurement::create([
        // 'bust' =>$request->bust,
        // 'thorax' =>$request->thorax,
        // 'waist' =>$request->waist,
        // 'hip' =>$request->hip,
        // 'thigh' =>$request->thigh,
        // 'calf' =>$request->calf,
        // 'evaluation_id' =>$request->evaluation_id
        // ]);
        // return redirect('evaluation?success=Medidas corporais foram criadas com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BodyMeasurement  $bodyMeasurement
     * @return \Illuminate\Http\Response
     */
    public function show(BodyMeasurement $bodyMeasurement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BodyMeasurement  $bodyMeasurement
     * @return \Illuminate\Http\Response
     */
    public function edit(BodyMeasurement $bodyMeasurement)
    {
        //return redirect("/evaluation?edit=$bodyMeasurement->id")
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BodyMeasurement  $bodyMeasurement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BodyMeasurement $bodyMeasurement)
    {
        $bodyMeasurement->update($request->all());
        return redirect()
        ->route('evaluation', ['patient' => $bodyMeasurement->evaluation->patient])
        ->with('success', 'Medidas corporais atualizadas com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BodyMeasurement  $bodyMeasurement
     * @return \Illuminate\Http\Response
     */
    public function destroy(BodyMeasurement $bodyMeasurement)
    {
        //
    }
}
