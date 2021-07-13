<?php

namespace App\Http\Controllers;

use App\Models\SkinFold;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class SkinFoldController extends Controller
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
        // $skinfold = SkinFold::create([
            // 'breastplate' => $request->'breastplate',
            // 'biceps' => $request->'biceps',
            // 'triceps' => $request->'triceps',
            // 'abdominal' => $request->'abdominal',
            // 'subscapular' => $request->'subscapular',
            // 'suprailiaco' => $request->'suprailiaco',
            // 'middle_axillary' => $request->'middle_axillary',
            // 'thigh' => $request->'thigh',
            // 'calf' => $request->'calf',
            // 'Lumbar' => $request->'Lumbar',
            // 'evaluation_id' => $request->'evaluation_id'

        // ]);
            // return redirect('evaluation?sucess=Dobras cutâneas criadas com sucesso')

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SkinFold  $SkinFold
     * @return \Illuminate\Http\Response
     */
    public function show(SkinFold $SkinFold)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SkinFold  $SkinFold
     * @return \Illuminate\Http\Response
     */
    public function edit(SkinFold $SkinFold)
    {
        // return redirect("/evaluation?edit=$skinfold->id");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SkinFold  $SkinFold
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SkinFold $SkinFold)
    {
        $e= SkinFold::where('evaluation_id',$request->id)->get()[0]->id;
        $patid = SkinFold::find($e)->evaluation->patient->user->id;
        SkinFold::findOrFail($e)->update($request->all());
        return redirect("evaluation?patient=$patid&success=Dobras cutâneas atualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SkinFold  $SkinFold
     * @return \Illuminate\Http\Response
     */
    public function destroy(SkinFold $SkinFold)
    {
        //
    }
}
