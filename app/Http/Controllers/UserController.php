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

class UserController extends Controller
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
    public function show(User $user)
    {
        return view('profile', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {

        if(! Hash::check($request->current_password, $user->password)){

           return redirect()
            ->route('profile', ['user' => $user])
            ->with('error', 'A senha atual não coincide!');

        }else if($request->new_password != $request->password_confirmation){

            return redirect()
            ->route('profile', ['user' => $user])
            ->with('error', 'As senhas informadas não coincidem!');

        }else if($request->current_password != $request->new_password){

            $user->password =  Hash::make($request->new_password);
            $user->save();

            return redirect()
            ->route('profile', ['user' => $user])
            ->with('success', 'Senha redefinida com sucesso!');

        }else{
            return redirect()
            ->route('profile', ['user' => $user])
            ->with('error', 'A nova senha não pode ser idêntica a atual!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $user->name = $request->name;
        $user->location = $request->location;
        $user->phone = $request->phone;
        $user->save();

        if($user->isPatient()){
            $patient = $user->patientProfile;
            $patient->birth_date = $request->birth_date;
            $patient->save();
        }else{
            $user->nutritionistProfile->CRN = $request->crn;
            $user->save();
        }

        return redirect()
            ->route('profile', ['user' => $user])
            ->with('success', 'Dados atualizados com sucesso!');

    }

    public function users() {
        $users = [];
        foreach (User::all() as $user) {
            if (Auth::user()->isNutritionist() && $user->isPatient()) {
                array_push($users, $user);
            } elseif (Auth::user()->isPatient() && $user->isNutritionist()) {
                array_push($users, $user);
            }
        }
        return json_encode($users);
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
