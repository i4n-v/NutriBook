<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class PatientController extends Controller
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
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user = User::find(auth()->user()->id);

        if(! Hash::check($request->current_password, $user->password)){

            return redirect("/profile?error=A senha atual não coincide!");

        }else if($request->new_password != $request->password_confirmation){

            return redirect("/profile?error=As senhas informadas não coincidem!");

        }else if($request->current_password != $request->new_password){

            $user->password =  Hash::make($request->new_password);
            $user->save();
            return redirect("/profile?success=Senha redefinida com sucesso!");

        }else{
            return redirect("/profile?error=A nova senha não pode ser igual a senha atual!");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {

        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->save();

        $patient = Patient::find($user->patientProfile->id);
        $patient->birth_date = $request->birth_date;
        $patient->save();

        return redirect("/profile?success=Dados atualizados com sucesso!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
