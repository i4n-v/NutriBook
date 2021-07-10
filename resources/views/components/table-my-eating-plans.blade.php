@php

$patient_collection = App\Models\Patient::where('user_id', Auth::user()->id)->get();

@endphp

<table class="w-full bg-white shadow-lg border-solid border-b-2 rounded-sm">
    <thead class="h-10 bg-gray-700 text-white rounded-sm">
        <th class="rounded-tl-sm">
            <x-ordering-selector>
                {{ __('Título') }}
            </x-ordering-selector>
        </th>
        <th>
            <x-ordering-selector>
                {{ __('Data de início') }}
            </x-ordering-selector>
        </th>
        <th>
            <x-ordering-selector>
                {{ __('Data de término') }}
            </x-ordering-selector>
        </th>
        <th class="rounded-tr-sm">Ações</th>
    </thead>

    @foreach ($patient_collection as $patient)
    @php
    $eating_plan_collection = App\Models\EatingPlan::where('patient_id', $patient->id)->get();

    @endphp

    @foreach ($eating_plan_collection as $eating_plan)
    <tr class="border transition delay-150 hover:bg-gray-100 text-left" x-data="{ confirm:false }">

        <td class="pl-2 rounded-tl-sm">
            {{ $eating_plan->title }}
        </td>
        <td>
            {{ $eating_plan->date_start }}
        </td>
        <td>
            {{ $eating_plan->date_finish }}
        </td>
        <td class="flex items-center justify-center gap-4 rounded-tr-sm">
            <x-button-visual href="{{ route('view_eating_plan', $eating_plan) }}" />
            <x-button-edit />
            <x-button-delete @click="confirm=true" />
            <template x-if="confirm">
                <x-modal>
                    <x-confirm-template>
                        <x-confirm-button class="px-9" href="{{ route('eatingplan_delete', $eating_plan->id) }}">Sim</x-confirm-button>
                        <x-slot name="text">Você realmente deseja excluir este plano alimentar?</x-slot>
                    </x-confirm-template>
                </x-modal>
            </template>
        </td>
    </tr>
    @endforeach

    @endforeach

</table>