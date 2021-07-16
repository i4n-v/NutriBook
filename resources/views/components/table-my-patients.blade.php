@props(['column', 'value'])

@php

// $nutritionist = App\Models\Nutritionist::where('user_id', Auth::user()->id)->get();
$nutritionist = Auth::user()->nutritionistProfile;
$nutritionist_id = $nutritionist->id;
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
        <th class="rounded-tr-sm">Ações</th>
    </thead>

    @php

    $users_patients = $nutritionist->eatingPlans->map(function($ep) {
        return $ep->patient->user->id;
    });

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
            {{ cpf_display($user->CPF) }}
        </td>
        <td class="text-center">
            28/06/2021 (Em breve)
        </td>
        <td class="flex items-center justify-center gap-2 rounded-tr-sm pl-2">
            <x-button-visual href="{{route('profile', $user)}}"/>
            <x-evaluation-button href="{{route('evaluation', $user->patientProfile)}}"/>
            <x-eating-plan-button href="{{route('view_eating_plan', $user)}}"/>
        </td>
    </tr>
    @endforeach

</table>

@php

function cpf_display($string) {
    $arr = str_split($string, 3);
    $save = array();
    for ($i = 0; $i < sizeof($arr); $i++) {
        if ($i == 0 || $i == 1) {
            array_push($save, $arr[$i]);
            array_push($save, '.');
        } elseif ($i == 2) {
            array_push($save, $arr[$i]);
            array_push($save, '-');
        } else {
            array_push($save, $arr[$i]);
        }
    }
    $cpf_final = $save[0];

    for ($i = 1; $i < sizeof($save); $i++) {
        $cpf_final = $cpf_final . "$save[$i]";
    }
    return $cpf_final;
}

@endphp