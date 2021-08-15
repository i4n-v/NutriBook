<table class="w-full bg-white shadow-lg border-solid border-b-2 rounded-sm" x-data="foods" x-init="loadFoods">
    <thead class="h-10 bg-gray-700 text-white rounded-sm">
        <th class="rounded-tl-sm">Alimento</th>
        <th>Peso</th>
        <th class="rounded-tr-sm">Ações</th>
    </thead>
    <tbody>
        <template x-for="food in foods">
            <tr class="border transition delay-150 hover:bg-gray-100 text-left rounded-sm">
                <td class="pl-2 rounded-bl-sm" x-text="food.food"></td>
                <td class="pl-32" x-text="food.weight + 'g'"></td>
                <td class="flex items-center justify-center gap-4 rounded-br-sm">
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
