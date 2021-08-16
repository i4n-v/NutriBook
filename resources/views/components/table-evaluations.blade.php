@props(['patient'])


@php
if(Auth::user()->isPatient()){
        $evaluations = App\Models\Evaluation::where('patient_id', Auth::user()->profile()->id)->get();
        $id = Auth::user()->profile()->id;
    }else{
        $evaluations = App\Models\Evaluation::where('nutritionist_id', Auth::user()->profile()->id)->where('patient_id', $patient->patientProfile->id)->get();
        $id = $patient->patientProfile->id;
    }
@endphp

<div x-data="evaluations" x-init="loadEvaluations({{ $id }})">

    <div class="w-full pb-6">

    </div>

    <div class="w-6/12 m-auto">
        <table class="table-fixed w-full bg-white shadow-lg border-solid border-b-2 rounded-sm">
            <thead class="h-10 bg-gray-700 text-white rounded-sm">
                <th>
                    <div class="grid grid-cols-12">
                        <div class="col-start-1 col-end-12 m-auto">
                            Data da avaliação
                        </div>
                        <div class="col-start-12 col-end-12">
                            <x-ordering-selector :col="'created_at'"/>
                        </div>
                    </div>
                </th>
                <th>
                    <div class="grid grid-cols-12">
                        <div class="col-start-1 col-end-12 m-auto">
                            Última atualização
                        </div>
                        <div class="col-start-12 col-end-12">
                            <x-ordering-selector :col="'updated_at'"/>
                        </div>
                    </div>
                </th>
                <th class="rounded-tr-sm">Ações</th>
            </thead>
            <tbody>
                <template x-for="evaluation in evaluations">
                    <tr class="border transition delay-150 hover:bg-gray-100 text-left">
                        <td class="text-center rounded-tl-sm" x-text="evaluation.formatted_created_at"></td>
                        <td class="text-center" x-text="evaluation.formatted_updated_at"></td>
                        <td class="flex items-center justify-center gap-2 rounded-tr-sm">
                            <x-button-visual x-bind:href="'/evaluation/view/' + evaluation.id"/>
                            @if(Auth::user()->isNutritionist())
                                <x-button-edit x-bind:href="'/evaluation/edit/' + evaluation.id"/>
                                <x-button-delete @click="confirm = true, evaluationId = evaluation.id" />
                            @endif
                        </td>
                    </tr>
                </template>
                <template x-if="confirm">
                    <x-modal>
                        <x-confirm-template>
                            <x-confirm-button class="px-9" x-bind:href="'/evaluation/delete/' + evaluationId">Sim</x-confirm-button>
                            <x-confirm-button class="px-8" @click="confirm = false" @click.away="confirm = false">Não</x-confirm-button>
                            <x-slot name="text">{{ 'Você realmente deseja excluir a avaliação de '.explode(' ',$patient->name)[0].'?' }}</x-slot>
                        </x-confirm-template>
                    </x-modal>
                </template>
            </tbody>
        </table>
    </div>

</div>
