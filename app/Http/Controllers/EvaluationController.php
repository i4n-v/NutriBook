<?php

namespace App\Http\Controllers;
use App\Models\Anamnese;
use App\Models\SkinFold;
use App\Models\BodyMeasurement;
use App\Models\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
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
    public function store(Evaluation $evaluation, Request $request)
    {
        $evaluation = Evaluation::create([
            'weight' => null,
            'height' => null,
            'nutritionist_id' => Auth::user()->nutritionistProfile->id,
            'patient_id' => $request->id,
            ]);
            // echo($evaluation->created_at);
            $evid = Evaluation::where('created_at', $evaluation->created_at)->get()[0]->id;
            //  var_dump($eva);
             
            $anamnese = Anamnese::create([
            'objective' =>null,
            'pathological_history' =>null,
            'family_history' =>null,
            'used_drugs' =>null,
            'life_style' =>null,
            'allergies' =>null,
            'evaluation_id' => $evid
        ]);
        
        $SkinFold = SkinFold::create([
            'breastplate' => null,
            'biceps' => null,
            'triceps' => null,
            'abdominal' => null,
            'subscapular' => null,
            'suprailiaco' => null,
            'middle_axillary' => null,
            'thigh' => null,
            'calf' => null,
            'lumbar' => null,
            'evaluation_id' => $evid
        ]);
        $bodyMeasurement = BodyMeasurement::create([
        'bust' =>null,
        'thorax' =>null,
        'waist' =>null,
        'hip' =>null,
        'thigh' =>null,
        'calf' =>null,
        'evaluation_id' => $evid
        ]);
        $idpatient = $evaluation->patient->user->id;
        return redirect("/evaluation?patient=$idpatient&success=Avaliação criada com sucesso!");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function show(Evaluation $evaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Evaluation $evaluation)
    {

        $id = $evaluation->nutritionist->user->id;
       
        if($id == auth()->user()->id){
            return redirect("/evaluation/form?evaluation=$evaluation->id");
       }else{
           return redirect()->route('login');
       }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evaluation $evaluation)
    {
        $patid = Evaluation::find($request->id)->patient->user->id;
        Evaluation::findOrFail($request->id)->update($request->all());
        return redirect("evaluation?patient=$patid&success=Avaliação atualizada com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evaluation $evaluation)
    {
        $idpatient = $evaluation->patient->user->id;
        $evaluation->delete();
        return redirect("/evaluation?patient=$idpatient&success=Avaliação excluido com sucesso!");
    }
}
