@props(['eatingPlan'])

<div x-data="eatingPlan" x-init="loadMeals({{ $eatingPlan->id }})">
    <form x-ref="planForm" action="{{ route('eatingplan_create', $eatingPlan->patient) }}">
        @csrf
        <legend><span class="text-white text-xl border-b-2 mb-5">Dados do plano alimentar</span></legend>

        <!-- Title -->
        <div class="mt-4">
            <x-label for="title" :value="__('Título')" />

            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$eatingPlan->title" required autofocus placeholder="Digite o título"/>
        </div>

        <!-- Date Start -->
        <div class="mt-4">
            <x-label for="date-start" :value="__('Data de início')" />

            <x-input id="date-start" class="block mt-1 w-full" type="date" name="date_start" :value="$eatingPlan->date_start" required autofocus
            />
        </div>

        <!-- Date Finish -->
        <div class="mt-4">
            <x-label for="date-finish" :value="__('Data de fim')" />

            <x-input id="date-finish" class="block mt-1 w-full" type="date" name="date_finish" :value="$eatingPlan->date_finish" required autofocus
            />
        </div>
    </form>

    <form class="mt-6">
        @csrf
        <legend><span class="text-white text-xl border-b-2 mb-5">Refeições</span></legend>

        <template x-for="(meal, i) in meals">
            <div class="mt-10">

                <span class="float-right font-bold text-white text-xl transition delay-150 hover:text-red-500 cursor-pointer mb-2" @click="confirm = true; mealIndex = i">x</span>

                <div class="mb-3 w-full">
                    <x-label for="desc" :value="__('Descrição')" />

                    <x-input id="desc" name="desc" class="block mt-1 w-full" type="text" required autofocus placeholder="Ex: Café da manhã, almoço..." x-model="meal.desc" />
                </div>

                <div class="grid grid-cols-2 gap-5">

                    <div>
                        <x-label for="carbo" :value="__('Carboidrato')" />

                        <select id="carbohydrate" class="block mt-1 w-full rounded-md focus:border-yellow-300 focus:shadow-lg focus:ring-1 focus:ring-yellow-300" name="carbo" required autofocus x-model="meal.carbo">
                            @foreach (\App\Models\Food::carboFoods() as $food)
                                <option value="{{ $food->id }}">{{ $food->food }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-label for="carbo_weight" :value="__('Peso(g)')" />

                        <x-input id="carbo_weight" class="block mt-1 w-full" type="number" name="carbo_weight" required autofocus placeholder="Peso do alimento" x-model="meal.carboWeight"/>
                    </div>

                    <div>
                        <x-label for="protein" :value="__('Proteína')" />

                        <select class="block mt-1 w-full rounded-md focus:border-yellow-300 focus:shadow-lg focus:ring-1 focus:ring-yellow-300" name="protein" required autofocus x-model="meal.protein">
                            @foreach (\App\Models\Food::proteinFoods() as $food)
                                <option value="{{ $food->id }}">{{ $food->food }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-label for="protein_weight" :value="__('Peso(g)')" />

                        <x-input id="protein_weight" class="block mt-1 w-full" type="number" name="protein_weight" required autofocus placeholder="Peso do alimento" x-model="meal.proteinWeight"/>
                    </div>

                    <div>
                        <x-label for="fat" :value="__('Gordura')" />

                        <select id="fat" class="block mt-1 w-full rounded-md focus:border-yellow-300 focus:shadow-lg focus:ring-1 focus:ring-yellow-300" name="fat" required autofocus x-model="meal.fat">
                            @foreach (\App\Models\Food::fatFoods() as $food)
                                <option value="{{ $food->id }}">{{ $food->food }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-label for="fat_weight" :value="__('Peso(g)')" />

                        <x-input id="fat_weight" class="block mt-1 w-full" type="number" name="fat_weight" required autofocus placeholder="Peso do alimento" x-model="meal.fatWeight"/>
                    </div>
                </div>
            </div>
        </template>
        <template x-if="confirm">
            <x-modal>
                <x-confirm-template>
                <x-confirm-button class="px-9" x-on:click="removeMeal(mealIndex)">Sim</x-confirm-button>
                    <x-slot name="text">
                        Você realmente deseja remover essa refeição?
                    </x-slot>
                </x-confirm-template>
            </x-modal>
        </template>

        <div class="bg-yellow-400 rounded-md text-center mt-5 transition delay-150 hover:bg-yellow-500 cursor-pointer shadow-md" x-on:click="addMeal">
            <span class="w-full text-gray-900 font-bold">Adicionar refeição</span>
        </div>

    </form>

    <div class="flex items-center justify-end mt-4">
        <x-add-button class="px-8" x-on:click="saveMealsCreated({{ $eatingPlan->id }})">
            {{ __('salvar') }}
        </x-add-button>

        <x-cancel-button class="ml-4" href="{{ route('eating_plan', $eatingPlan->patient->user) }}">
            Cancelar
        </x-cancel-button>
    </div>
</div>