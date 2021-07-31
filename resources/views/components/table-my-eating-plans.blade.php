@props(['id'])

<div x-data="eatingPlansTable" x-init="loadEatingPlans({{ $id }})">

    <div class="w-full pb-6">
        <x-filters-eating-plans/>
    </div>

    <div class="w-9/12 m-auto">
        <table class="w-full bg-white shadow-lg border-solid border-b-2 rounded-sm" >
            <thead class="h-10 bg-gray-700 text-white rounded-sm">
                <th class="rounded-tl-sm">
                    <div class="grid grid-cols-12">
                        <div class="col-start-1 col-end-12 m-auto">
                            Título
                        </div>
                        <div class="col-start-12 col-end-12">
                            <x-ordering-selector :col="'title'"/>
                        </div>
                    </div>
                </th>
                <th>
                    <div class="grid grid-cols-12">
                        <div class="col-start-1 col-end-12 m-auto">
                            Data de início
                        </div>
                        <div class="col-start-12 col-end-12">
                            <x-ordering-selector :col="'date_start'"/>
                        </div>
                    </div>
                </th>
                <th>
                    <div class="grid grid-cols-12">
                        <div class="col-start-1 col-end-12 m-auto">
                            Data de término
                        </div>
                        <div class="col-start-12 col-end-12">
                            <x-ordering-selector :col="'date_finish'"/>
                        </div>
                    </div>
                </th>
                <th class="rounded-tr-sm">Ações</th>
            </thead>

            <template x-for="(eatingPlan, i) in eatingPlans">
                <tr class="border transition delay-150 hover:bg-gray-100 text-left" x-show="eatingPlan.show">
                    <td class="pl-2 rounded-tl-sm" x-text="eatingPlan.title">
                    <td class="text-center" x-text="eatingPlan.formatted_date_start">
                    </td>
                    <td class="text-center"x-text="eatingPlan.formatted_date_finish" >
                    </td>
                    <td class="flex items-center justify-center gap-4 rounded-tr-sm">
                    <x-button-visual x-on:click="redirectToView(eatingPlan.id)"/>
                        @if(Auth::user()->isNutritionist())
                            <x-button-edit x-on:click="redirectToEdit(eatingPlan.id)"/>
                            <x-button-delete @click="confirm = true; plan = eatingPlan"/>
                        @endif
                    </td>
                </tr>
            </template>
            <template x-if="confirm">
                <x-modal>
                    <x-confirm-template>
                    <x-confirm-button class="px-9" x-on:click="deletePlan(plan.id)">Sim</x-confirm-button>
                        <x-slot name="text">
                            Você realmente deseja excluir plano alimentar <span x-text="plan.title"></span>?
                        </x-slot>
                    </x-confirm-template>
                </x-modal>
            </template>

        </table>

    </div>
</div>