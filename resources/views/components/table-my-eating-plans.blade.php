@props(['column', 'value'])

@php
    if(Auth::user()->isNutritionist()){
        $patient_collection = App\Models\Patient::where('user_id', $_GET['patient'])->get();
    }else{
        $patient_collection = App\Models\Patient::where('user_id', Auth::user()->id)->get();
    }
@endphp

<table class="w-full bg-white shadow-lg border-solid border-b-2 rounded-sm">
    <thead class="h-10 bg-gray-700 text-white rounded-sm">
        <th class="rounded-tl-sm">
            <div class="grid grid-cols-12">
                <div class="col-start-1 col-end-12 m-auto">
                    Título
                </div>
                <div class="col-start-12 col-end-12">
                    <x-ordering-selector :asc="'titleAsc'" :desc="'titleDesc'"/>
                </div>
            </div>
        </th>
        <th>
            <div class="grid grid-cols-12">
                <div class="col-start-1 col-end-12 m-auto">
                    Data de início
                </div>
                <div class="col-start-12 col-end-12">
                    <x-ordering-selector :asc="'dateStartAsc'" :desc="'dateStartDesc'"/>
                </div>
            </div>
        </th>
        <th>
            <div class="grid grid-cols-12">
                <div class="col-start-1 col-end-12 m-auto">
                    Data de término
                </div>
                <div class="col-start-12 col-end-12">
                    <x-ordering-selector :asc="'dateFinishAsc'" :desc="'dateFinishDesc'"/>
                </div>
            </div>
        </th>
        <th class="rounded-tr-sm">Ações</th>
    </thead>

    @foreach ($patient_collection as $patient)

        @php
        if(Auth::user()->isNutritionist()){
            if ($column == '' || $value == '') {
                $eating_plan_collection = App\Models\EatingPlan::where('patient_id', $patient->id)->where('nutritionist_id', Auth::user()->id)->orderBy('title', 'asc')->get();
            } else {
                $eating_plan_collection = App\Models\EatingPlan::where('patient_id', $patient->id)->orderBy($column, $value)->get();
            }
        }else{
            if ($column == '' || $value == '') {
                $eating_plan_collection = App\Models\EatingPlan::where('patient_id', $patient->id)->orderBy('title', 'asc')->get();
            } else {
                $eating_plan_collection = App\Models\EatingPlan::where('patient_id', $patient->id)->orderBy($column, $value)->get();
            }
        }
        @endphp

        @foreach ($eating_plan_collection as $eating_plan)
        <tr class="border transition delay-150 hover:bg-gray-100 text-left" x-data="{ confirm:false }">

            <td class="pl-2 rounded-tl-sm">
                {{ $eating_plan->title }}
            <td class="text-center">
                {{ $eating_plan->date_start }}
            </td>
            <td class="text-center">
                {{ $eating_plan->date_finish }}
            </td>
            <td class="flex items-center justify-center gap-4 rounded-tr-sm">
                <x-button-visual href="{{ route('view_eating_plan', $eating_plan) }}" />
                @if(Auth::user()->isNutritionist())
                    <x-button-edit />
                    <x-button-delete @click="confirm=true" />
                @endif
                <template x-if="confirm">
                    <x-modal>
                        <x-confirm-template>
                        <x-confirm-button class="px-9" href="{{ route('eatingplan_delete', $eating_plan->id) }}">   Sim</x-confirm-button>
                            <x-slot name="text">Você realmente deseja excluir este plano alimentar?</x-slot>
                        </x-confirm-template>
                    </x-modal>
                </template>
            </td>
        </tr>
        @endforeach

    @endforeach

</table>