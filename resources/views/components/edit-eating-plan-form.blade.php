@props(['eatingPlan'])

<div x-data="eatingPlan" x-init="loadMeals({{ $eatingPlan->id }})">
    <form x-ref="planForm" action="{{ route('eatingplan_create', $eatingPlan->patient) }}">
        @csrf

        <legend><span class="text-gray-900 text-xl border-b-2 border-gray-400 mb-5">Dados do plano alimentar</span></legend>

        <!-- Title -->
        <div class="flex w-full mt-4 gap-2">
            <div class="flex-auto">
                <x-label class="text-gray-800 text-md font-bold" for="title" :value="__('Título')" />

                <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$eatingPlan->title" required autofocus placeholder="Digite o título"/>
            </div>

            <!-- Date Start -->
            <div>
                <x-label class="text-gray-800 text-md font-bold" for="date-start" :value="__('Data de início')" />

                <x-input id="date-start" class="block mt-1 w-full" type="date" name="date_start" :value="$eatingPlan->date_start" required autofocus
                />
            </div>

            <!-- Date Finish -->
            <div>
                <x-label class="text-gray-800 text-md font-bold" for="date-finish" :value="__('Data de fim')" />

                <x-input id="date-finish" class="block mt-1 w-full" type="date" name="date_finish" :value="$eatingPlan->date_finish" required autofocus
                />
            </div>
        </div>
    </form>

    <form class="mt-6">
        @csrf
        <legend><span class="text-gray-900 text-xl mb-5">Refeições</span></legend>

        <template x-for="(meal, i) in meals">
            <div class="mt-2 mb-4 border-t-2 border-gray-400 relative">
                <div x-show="meal.deleteModal">
                    <x-modal>
                        <x-confirm-template>
                        <x-confirm-button class="px-9" x-on:click="addMealToRemove(i)">Sim</x-confirm-button>
                        <x-confirm-button class="px-8" @click="meal.deleteModal=false" @click.away="meal.deleteModal=false">Não</x-confirm-button>
                            <x-slot name="text">
                                Você realmente deseja remover essa refeição?
                            </x-slot>
                        </x-confirm-template>
                    </x-modal>
                </div>
                <div class="h-4 w-full text-right">
                    <span class="font-bold text-gray-800 text-xl transition delay-150 hover:text-red-500 cursor-pointer mb-2" @click="meal.deleteModal = true; mealIndex = i">x</span>
                </div>

                <div class="mb-3 w-full">
                    <x-label class="text-gray-800 text-md font-bold" for="desc" :value="__('Descrição')" />
                    <x-input id="desc" name="desc" class="block mt-1 w-2/3" type="text" required autofocus placeholder="Ex: Café da manhã, almoço..." x-model="meal.desc" />
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <div class="grid grid-cols-5 gap-2">
                        <div class="col-span-3">
                            <x-label class="text-gray-800 text-md font-bold" for="carbo" :value="__('Carboidrato')" />

                            <select id="carbohydrate" class="block mt-1 w-full rounded-md focus:border-yellow-300 focus:shadow-lg focus:ring-1 focus:ring-yellow-300" name="carbo" required autofocus x-model="meal.carbo">
                                <option value="0" selected="selected">-</option>
                                @foreach (\App\Models\Food::carboFoods() as $food)
                                    <option value="{{ $food->id }}">{{ $food->food }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-2">
                            <x-label class="text-gray-800 text-md font-bold" for="carbo_weight" :value="__('Peso(g)')" />

                            <x-input id="carbo_weight" class="block mt-1 w-full" type="number" name="carbo_weight" autofocus placeholder="Peso do alimento" x-model="meal.carboWeight"/>
                        </div>
                    </div>

                    <div class="grid grid-cols-5 gap-2">
                        <div class="col-span-3">
                            <x-label class="text-gray-800 text-md font-bold" for="protein" :value="__('Proteína')" />
                            <select class="block mt-1 w-full rounded-md focus:border-yellow-300 focus:shadow-lg focus:ring-1 focus:ring-yellow-300" name="protein" required autofocus x-model="meal.protein">
                                <option value="0" selected="selected">-</option>
                                @foreach (\App\Models\Food::proteinFoods() as $food)
                                    <option value="{{ $food->id }}">{{ $food->food }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-2">
                            <x-label class="text-gray-800 text-md font-bold" for="protein_weight" :value="__('Peso(g)')" />

                            <x-input id="protein_weight" class="block mt-1 w-full" type="number" name="protein_weight" autofocus placeholder="Peso do alimento" x-model="meal.proteinWeight"/>
                        </div>
                    </div>
                    <div class="grid grid-cols-5 gap-2">
                        <div class="col-span-3">
                            <x-label class="text-gray-800 text-md font-bold" for="fat" :value="__('Gordura')" />
                            <select id="fat" class="block mt-1 w-full rounded-md focus:border-yellow-300 focus:shadow-lg focus:ring-1 focus:ring-yellow-300" name="fat" required autofocus x-model="meal.fat">
                                <option value="0" selected="selected">-</option>
                                @foreach (\App\Models\Food::fatFoods() as $food)
                                    <option value="{{ $food->id }}">{{ $food->food }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-2">
                            <x-label class="text-gray-800 text-md font-bold" for="fat_weight" :value="__('Peso(g)')" />
                            <x-input id="fat_weight" class="block mt-1 w-full" type="number" name="fat_weight" autofocus placeholder="Peso do alimento" x-model="meal.fatWeight"/>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </form>


    <span class="bg-yellow-400 rounded-md text-center transition delay-150 hover:bg-yellow-500 cursor-pointer shadow-md px-2 py-2 text-gray-900 font-semibold float-left" x-on:click="addMeal">Adicionar refeição</span>

    <div class="flex items-center justify-end mt-4">
        <x-add-button class="px-8" x-on:click="saveMealsCreated({{ $eatingPlan->id }})">
            {{ __('salvar') }}
        </x-add-button>

        <x-cancel-button class="ml-4" href="{{ route('eating_plan', $eatingPlan->patient->user) }}">
            Cancelar
        </x-cancel-button>
    </div>
</div>