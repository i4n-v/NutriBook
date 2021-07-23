@props(['column', 'value'])

@php

$nutritionist = Auth::user()->nutritionistProfile;
$users_patients = array();

@endphp

<table class="w-full bg-white shadow-lg border-solid border-b-2 rounded-sm" x-data="nutriPatients" x-init="loadPatients">
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

    <template x-for="patient in patients">
        <tr class="border transition delay-150 hover:bg-gray-100 text-left">
            <td class="pl-2 rounded-tl-sm" x-text="patient.name"></td>
            <td class="text-center" x-text="patient.formattedCPF"></td>
            <td class="text-center">
                28/06/2021 (Em breve)
            </td>
            <td class="flex items-center justify-center gap-2 rounded-tr-sm pl-2">
                <x-button-visual x-bind:href="'/profile/' + patient.id"/>
                <x-evaluation-button x-bind:href="'/evaluation/' + patient.patient_profile.id"/>
                <x-eating-plan-button x-bind:href="'/eatingPlan/' + patient.id"/>
            </td>
        </tr>
    </template>
   
</table>
