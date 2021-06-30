@php

$patient_collection = App\Models\Patient::where('user_id', Auth::user()->id)->get(); 

@endphp

<table class="w-full bg-white shadow-md border-solid border-2 border-gray-200">
        <thead class="h-10 bg-gray-200 text-left">
            <th class="pl-1">Título</th>
            <th>Data de início</th>
            <th>Data de término</th>
            <th class="text-center">Ações</th>
        </thead>

        @foreach ($patient_collection as $patient)
            @php
            $eating_plan_collection = App\Models\EatingPlan::where('patient_id', $patient->id)->get();
            @endphp

            @foreach ($eating_plan_collection as $eating_plan)
            <tr class="h-10 hover:bg-gray-100 border-solid border border-gray-200">
                <td class="pl-1">
                    {{ $eating_plan->title }}
                </td>
                <td class="text-left">
                    {{ $eating_plan->date_start }}
                </td>
                <td class="text-left">
                    {{ $eating_plan->date_finish }}
                </td>
                <td class="text-center">
                    <x-button-delete>
                        {{ ('Apagar') }}
                    </x-button-delete>
                    <x-button-edit>
                        {{ ('Editar') }}
                    </x-button-edit>
                    <x-button>
                        {{ __('Acessar') }}
                    </x-button>
                </td>
            </tr>
            @endforeach

        @endforeach

 </table>
