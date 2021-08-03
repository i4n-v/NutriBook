<div>

    <div class="w-full pb-6"> 
        <x-filters-search-results/>
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
                <th class="rounded-tr-sm">Ações</th>
            </thead>
        
                <tr class="border transition delay-150 hover:bg-gray-100 text-left">
                    <td class="w-2/4 pl-2 rounded-tl-sm">Jurema</td>
                    <td class="w-1/4 text-center">000.000.000-00</td>
                    <td class="flex items-center justify-center gap-2 rounded-tr-sm pl-2">
                        <x-button-visual x-bind:href=""/>
                        <x-add-user/>
                    </td>
                </tr>
    
        </table>
    </div>
</div>