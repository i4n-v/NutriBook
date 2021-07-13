@props(['column', 'value'])

@php

$nutritionist = App\Models\Nutritionist::where('user_id', Auth::user()->id)->get();
$nutritionist_id = $nutritionist[0]->id;
$eating_plans_patients = array();
$users_patients = array();

@endphp

<table class="w-full bg-white shadow-lg border-solid border-b-2 rounded-sm">
    <thead class="h-10 bg-gray-700 text-white rounded-sm">
        <th class="rounded-tl-sm">
            <div class="grid grid-cols-12">
                <div class="col-start-1 col-end-12 m-auto">
                    Nome
                </div>
                <div class="col-start-12 col-end-12">
                    <x-ordering-selector :asc="'nameAsc'" :desc="'nameDesc'"/>
                </div>
            </div>
        </th>
        <th>
            <div class="grid grid-cols-12">
                <div class="col-start-1 col-end-12 m-auto">
                    CPF
                </div>
                <div class="col-start-12 col-end-12">
                    <x-ordering-selector :asc="'cpfAsc'" :desc="'cpfDesc'"/>
                </div>
            </div>
        </th>
        <th>
            <div class="grid grid-cols-12">
                <div class="col-start-1 col-end-12 m-auto">
                    Data de vínculo
                </div>
                <div class="col-start-12 col-end-12">
                    <x-ordering-selector :asc="''" :desc="''"/>
                </div>
            </div>
        </th>
        <th class="rounded-tr-sm">Perfil</th>
    </thead>

    @php

    foreach (App\Models\EatingPlan::where('nutritionist_id', $nutritionist_id)->get() as $register) {
        array_push($eating_plans_patients, $register->patient_id);
    }

    $my_patients = array_unique($eating_plans_patients);

    foreach ($my_patients as $patient_id) {
        foreach (App\Models\Patient::where('id', $patient_id)->get() as $patient) {
            foreach (App\Models\User::where('id', $patient->user_id)->get() as $users) {
                array_push($users_patients, $users->id);
            }
        }
    }

    if ($column == '' || $value == '') {
        $patient_query = App\Models\User::whereIn('id', $users_patients)->orderBy('name', 'asc')->get();
    } else {
        $patient_query = App\Models\User::whereIn('id', $users_patients)->orderBy($column, $value)->get();
    }

    @endphp

    @foreach ($patient_query as $user) 
    <tr class="border transition delay-150 hover:bg-gray-100 text-left">
        <td class="pl-2 rounded-tl-sm">
            {{ $user->name }}
        </td>
        <td class="text-center">
            {{ $user->CPF }}
        </td>
        <td class="text-center">
            28/06/2021 (Em breve)
        </td>
        <td class="text-center w-2/12 rounded-tr-sm">
            <x-button-visual href="#"/>
        </td>
    </tr>    
    @endforeach

</table>
