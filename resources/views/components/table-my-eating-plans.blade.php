@php

$patient_collection = App\Models\Patient::where('user_id', Auth::user()->id)->get(); 

@endphp

<table class="w-full bg-white shadow-lg border-solid border-b-2">
        <thead class="h-10 bg-gray-700 text-white">
            <th>Título</th>
            <th>Data de início</th>
            <th>Data de término</th>
            <th>Ações</th>
        </thead>

        @foreach ($patient_collection as $patient)
            @php
            $eating_plan_collection = App\Models\EatingPlan::where('patient_id', $patient->id)->get();
            @endphp

            @foreach ($eating_plan_collection as $eating_plan)
            <tr class="border transition delay-150 hover:bg-gray-100 text-left">
                <td class="pl-2">
                    {{ $eating_plan->title }}
                </td>
                <td>
                    {{ $eating_plan->date_start }}
                </td>
                <td>
                    {{ $eating_plan->date_finish }}
                </td>
                <td class="flex items-center justify-center gap-4">
                    <x-button-visual/>
                    <x-button-edit/>
                    <x-button-delete/>
                </td>
            </tr>
            @endforeach

        @endforeach

 </table>
