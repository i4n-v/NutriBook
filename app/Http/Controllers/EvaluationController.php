<?php

namespace App\Http\Controllers;
use App\Models\Anamnese;
use App\Models\SkinFold;
use App\Models\BodyMeasurement;
use App\Models\Evaluation;
use App\Models\Patient;
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
    public function index(Patient $patient)
    {
        if(auth()->user()->isNutritionist()){
            return view('evaluation', ['patient' => $patient->user]);
        }else if(auth()->user()->isPatient()){
            return view('evaluation');
        }else{
            return redirect()->route('login');
        }
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
        $evaluation = Evaluation::create([
            'weight' => null,
            'height' => null,
            'nutritionist_id' => Auth::user()->nutritionistProfile->id,
            'patient_id' => $patient->id,
            ]);
            // echo($evaluation->created_at);
            // $evid = Evaluation::where('created_at', $evaluation->created_at)->get()[0]->id;
            //  var_dump($eva);

            $anamnese = Anamnese::create([
            'objective' =>null,
            'pathological_history' =>null,
            'family_history' =>null,
            'used_drugs' =>null,
            'life_style' =>null,
            'allergies' =>null,
            'evaluation_id' => $evaluation->id
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
            'evaluation_id' => $evaluation->id
        ]);
        $bodyMeasurement = BodyMeasurement::create([
        'bust' =>null,
        'thorax' =>null,
        'waist' =>null,
        'hip' =>null,
        'thigh' =>null,
        'calf' =>null,
        'evaluation_id' => $evaluation->id
        ]);

        // return redirect()->route('evaluation', ['patient' => $evaluation->patient->user-]);
        return redirect()
        ->route('evaluation', ['patient' => $patient])
        ->with('success', 'Avaliação criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function show(Evaluation $evaluation)
    {
        if (Auth::user()->isNutritionist()) {
            $myPatient = auth()->user()->nutritionistProfile->patients->find($evaluation->patient->id);
        }

        if(isset($myPatient)){
            return view('components/evaluation-view', ['evaluation' => $evaluation, 'patient' => $evaluation->patient->user]);
        }else if(auth()->user()->isPatient()){
            return view('components/evaluation-view', ['evaluation' => $evaluation]);
        }else{
            return redirect()->route('login');
        }
    }

    public function evaluations($patient_id)
    {
        if (Auth::user()->isNutritionist())
        {
            $evaluations = Evaluation::where('patient_id', $patient_id)->where('nutritionist_id', Auth::user()->nutritionistProfile->id)->orderBy('created_at', 'asc')->get();
        } else
        {
            $evaluations = Evaluation::where('patient_id', Auth::user()->patientProfile->id)->orderBy('created_at', 'desc')->get();
        }
        return $evaluations->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function edit(Evaluation $evaluation)
    {
        if(auth()->user()->id == $evaluation->nutritionist->user->id){
            return view('components/create-evaluation', ['evaluation' => $evaluation, 'patient' => $evaluation->patient->user]);
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
        $patient = $evaluation->patient;
        $evaluation->update($request->all());

        return redirect()
            ->route('evaluation', ['patient' => $patient])
            ->with('success', 'Avaliação atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evaluation $evaluation)
    {
        $patient = $evaluation->patient;
        $evaluation->delete();

        return redirect()
            ->route('evaluation', ['patient' => $patient])
            ->with('success', 'Avaliação excluida com sucesso!');
    }
}
