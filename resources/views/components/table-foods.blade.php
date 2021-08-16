<div x-data="foods" x-init="loadFoods">

    <div class="w-full pb-6">
        <div class="w-full m-auto">
        	<div class="w-full">
        		<button x-show="filter" x-on:click="filter = false" class="flex w-auto h-8 mb-2 -ml-0.5 bg-yellow-400 text-gray-900 font-semibold px-2 pt-1 border-transparent rounded-md cursor-pointer hover:bg-yellow-500 active:bg-gray-900 focus:outline-none focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
        			<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
        			</svg>
        			Ocultar filtros
        		</button>
        		<button x-show="!filter" x-on:click="filter = true" class="flex w-auto -ml-0.5 h-8 bg-yellow-400 text-gray-900 font-semibold px-2 pt-1 border-transparent rounded-md cursor-pointer hover:bg-yellow-500 active:bg-gray-900 focus:outline-none focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
        			<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
        			</svg>
        			Filtrar
        		</button>
        	</div>
        	<div class="w-full" x-show="filter">
        		<label>Nome do alimento:</label>
        		<x-input class="w-5/12" type="text" x-model="filterFood"/>
                <label>Peso mínimo (g):</label>
		        <x-input class="w-32" type="text" x-model="filterWMin" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"/>
		        <label>Peso máximo (g):</label>
		        <x-input id="kkk" class="w-32" type="text" x-model="filterWMax" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"/>
        	</div>
        </div>
    </div>

    <div class="w-7/12 m-auto">
        <table class="w-full bg-white shadow-lg border-solid border-b-2 rounded-sm">
            <thead class="h-10 bg-gray-700 text-white rounded-sm">
                <th class="rounded-tl-sm">
                    <div class="grid grid-cols-12">
                        <div class="col-start-1 col-end-12 m-auto">
                            Alimento
                        </div>
                        <div class="col-start-12 col-end-12">
                            <x-ordering-selector :col="'food'"/>
                        </div>
                    </div>
                </th>
                <th>
                    <div class="grid grid-cols-12">
                        <div class="col-start-1 col-end-12 m-auto">
                            Peso
                        </div>
                        <div class="col-start-12 col-end-12">
                            <x-ordering-selector :col="'weight'"/>
                        </div>
                    </div>
                </th>
                <th class="rounded-tr-sm">Ações</th>
            </thead>
            <tbody>
                <template x-for="food in foods">
                    <tr class="border transition delay-150 hover:bg-gray-100 text-left rounded-sm" x-show="food.show">
                        <td class="w-2/4 pl-2 rounded-tl-sm" x-text="food.food"></td>
                        <td class="w-1/4 text-center" x-text="food.weight + 'g'"></td>
                        <td class="flex items-center justify-center gap-2 rounded-tr-sm pl-2">
                            <x-button-visual @click="modal = true; fId = food.id; fS = food.sodium; fDF = food.dietary_fiber; fTrF = food.trans_fat; fSF = food.saturated_fat; fTF = food.total_fat; fP = food.protein; fC = food.carbohydrate; fEV = food.energetic_value"/>
                            <x-button-edit x-bind:href="'/foods/edit/' + food.id" />
                            <x-button-delete @click="confirm = true; fId = food.id" />
                        </td>
                    </tr>
                </template>
                <template x-if="confirm">
                    <x-modal>
                        <x-confirm-template>
                            <x-confirm-button class="px-9" x-bind:href="'/foods/remove/' + fId">
                                Sim
                            </x-confirm-button>
                            <x-confirm-button class="px-8" @click="confirm = false" @click.away="confirm = false">Não</x-confirm-button>
                            <x-slot name="text">Você realmente deseja excluir este alimento?</x-slot>
                        </x-confirm-template>
                    </x-modal>
                </template>
                <template x-if="modal">
                    <x-modal>
                        <div @click.away="modal = false">
                            <div class="w-11/12 m-auto">
                                <div class="text-white bg-gray-800 p-1 rounded-tl-sm rounded-tr-sm text-center font-bold">
                                    <span>Tabela nutricional</span>
                                </div>
                                <div class="m-auto rounded-lg grid grid-cols-2 border">  
                                    <div class="pl-2 border-b">Sódio</div><div class="pl-20 border-b" x-text="fS + 'mg'"></div>
                                    <div class="pl-2 border-b bg-gray-200">Fibra alimentar</div><div class="pl-20 border-b bg-gray-200" x-text="fDF + 'g'"></div>
                                    <div class="pl-2 border-b">Gorduras trans</div><div class="pl-20 border-b" x-text="fTrF + 'g'"></div>
                                    <div class="pl-2 border-b bg-gray-200">Gorduras saturadas</div><div class="pl-20 border-b bg-gray-200" x-text="fSF + 'g'"></div>
                                    <div class="pl-2 border-b">Gorduras totais</div><div class="pl-20 border-b" x-text="fTF + 'g'"></div>
                                    <div class="pl-2 border-b bg-gray-200">Proteína</div><div class="pl-20 border-b bg-gray-200" x-text="fP + 'g'"></div>
                                    <div class="border-b pl-2">Carboidratos</div><div class="border-b pl-20" x-text="fC + 'g'"></div>
                                    <div class="pl-2 border-b bg-gray-200">Valor energético</div><div class="pl-20 border-b bg-gray-200" x-text="fEV + 'g'"></div>
                                </div>
                            </div>
                        </div>
                    </x-modal>
                </template>
            </tbody>
        </table>
    </div>

</div>

