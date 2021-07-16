<?php

namespace App\Http\Controllers;

use App\Models\Anamnese;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Evaluation;

class AnamneseController extends Controller
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
        // $anamnese = Anamnese::create([
        //     'objective' =>$request->objective,
        //     'pathological_history' =>$request->pathological_history,
        //     'family_history' =>$request->family_history,
        //     'used_drugs' =>$request->used_drugs,
        //     'life_style' =>$request->life_style,
        //     'allergies' =>$request->allergies,
        //     'evaluation_id' =>$request->evaluation_id
        // ]);
        // return redirect('evaluation?sucess=Anamnese foi criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anamnese  $anamnese
     * @return \Illuminate\Http\Response
     */
    public function show(Anamnese $anamnese)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anamnese  $anamnese
     * @return \Illuminate\Http\Response
     */
    public function edit(Anamnese $anamnese)
    {
        //return redirect("/evaluation?edit=$anamnese->id")
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anamnese  $anamnese
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anamnese $anamnese)
    {
        $anamnese->update($request->all());
        return redirect()
        ->route('evaluation', ['patient' => $anamnese->evaluation->patient])
        ->with('success', 'Anamnese atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anamnese  $anamnese
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anamnese $anamnese)
    {
        //
    }
}
