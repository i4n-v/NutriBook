<div x-data="nutriPatients" x-init="loadPatients">

    <div class="w-full pb-6"> 
        <x-filters-patients/>
    </div>

    <div class="w-9/12 m-auto">
        <table class="w-full bg-white shadow-lg border-solid border-b-2 rounded-sm">
            <thead class="h-10 bg-gray-700 text-white rounded-sm">
                <th class="rounded-tl-sm">
                    <div class="grid grid-cols-12">
                        <div class="col-start-1 col-end-12 m-auto">
                            Nome
                        </div>
                        <div class="col-start-12 col-end-12">
                            <x-ordering-selector :col="'name'"/>
                        </div>
                    </div>
                </th>
                <th>
                    <div class="grid grid-cols-12">
                        <div class="col-start-1 col-end-12 m-auto">
                            CPF
                        </div>
                        <div class="col-start-12 col-end-12">
                            <x-ordering-selector :col="'CPF'"/>
                        </div>
                    </div>
                </th>
                <th>
                    <div class="grid grid-cols-12">
                        <div class="col-start-1 col-end-12 m-auto">
                            Data de vínculo
                        </div>
                        <div class="col-start-12 col-end-12">
                            <x-ordering-selector :col="''"/>
                        </div>
                    </div>
                </th>
                <th class="rounded-tr-sm">Ações</th>
            </thead>
            
            <template x-for="user in patients">
                <tr class="border transition delay-150 hover:bg-gray-100 text-left" x-show="user.show">
                    <td class="w-2/4 pl-2 rounded-tl-sm" x-text="user.name"></td>
                    <td class="w-1/4 text-center" x-text="user.formattedCPF"></td>
                    <td class="w-1/4 text-center">
                        20/08/2021
                    </td>
                    <td class="flex items-center justify-center gap-2 rounded-tr-sm pl-2">
                        <x-button-visual x-bind:href="'/profile/' + user.id"/>
                        <x-evaluation-button x-bind:href="'/evaluation/' + user.patient_profile.id"/>
                        <x-eating-plan-button x-bind:href="'/eatingPlan/' + user.id"/>
                    </td>
                </tr>
            </template>
    
        </table>
    </div>
</div>