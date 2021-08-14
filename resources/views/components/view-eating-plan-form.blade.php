@props(['eatingPlan'])

<div x-data="eatingPlan" x-init="loadMeals({{ $eatingPlan->id }})">
    <form x-ref="planForm" action="{{ route('eatingplan_create', $eatingPlan->patient) }}">
        @csrf

        <legend><span class="text-gray-900 text-xl border-b-2 border-gray-400 mb-5">Dados do plano alimentar</span></legend>

        <!-- Title -->
        <div class="flex w-full mt-4 gap-2">
            <div class="flex-auto">
                <x-label class="text-gray-800 text-md font-bold" for="title" :value="__('Título')" />

                <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$eatingPlan->title" :disabled="true"/>
            </div>

            <!-- Date Start -->
            <div>
                <x-label class="text-gray-800 text-md font-bold" for="date-start" :value="__('Data de início')" />

                <x-input id="date-start" class="block mt-1 w-full" type="date" name="date_start" :value="$eatingPlan->date_start" :disabled="true"/>
            </div>

            <!-- Date Finish -->
            <div>
                <x-label class="text-gray-800 text-md font-bold" for="date-finish" :value="__('Data de fim')" />

                <x-input id="date-finish" class="block mt-1 w-full" type="date" name="date_finish" :value="$eatingPlan->date_finish" :disabled="true"/>
            </div>
        </div>
    </form>

    <form class="mt-6">
        @csrf
        <legend><span class="text-gray-900 text-xl mb-5">Refeições</span></legend>

        <template x-for="(meal, i) in meals">
            <div class="mt-2 mb-4 border-t-2 border-gray-400 relative">

                <div class="mt-4 mb-3 w-full">
                    <x-label class="text-gray-800 text-md font-bold" for="desc" :value="__('Descrição')" />
                    <x-input id="desc" name="desc" class="block mt-1 w-2/3" type="text" x-model="meal.desc" :disabled="true"/>
                </div>
                
                <div class="grid grid-cols-3 gap-4">
                    <div class="grid grid-cols-5 gap-2">
                        <div class="col-span-3">
                            <x-label class="text-gray-800 text-md font-bold" for="carbo" :value="__('Carboidrato')" />

                            <select id="carbohydrate" class="block mt-1 w-full rounded-md focus:border-yellow-300 focus:shadow-lg focus:ring-1 focus:ring-yellow-300" name="carbo" x-model="meal.carbo" :disabled="true">
                                <option value="0" selected="selected">-</option>
                                @foreach (\App\Models\Food::carboFoods() as $food)
                                    <option value="{{ $food->id }}">{{ $food->food }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-2">
                            <x-label class="text-gray-800 text-md font-bold" for="carbo_weight" :value="__('Peso(g)')" />

                            <x-input id="carbo_weight" class="block mt-1 w-full" type="number" name="carbo_weight" x-model="meal.carboWeight" :disabled="true"/>
                        </div>
                    </div>

                    <div class="grid grid-cols-5 gap-2">
                        <div class="col-span-3">
                            <x-label class="text-gray-800 text-md font-bold" for="protein" :value="__('Proteína')" />
                            <select class="block mt-1 w-full rounded-md focus:border-yellow-300 focus:shadow-lg focus:ring-1 focus:ring-yellow-300" name="protein" x-model="meal.protein" :disabled="true">
                                <option value="0" selected="selected">-</option>
                                @foreach (\App\Models\Food::proteinFoods() as $food)
                                    <option value="{{ $food->id }}">{{ $food->food }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-2">
                            <x-label class="text-gray-800 text-md font-bold" for="protein_weight" :value="__('Peso(g)')" />

                            <x-input id="protein_weight" class="block mt-1 w-full" type="number" name="protein_weight" x-model="meal.proteinWeight" :disabled="true"/>
                        </div>
                    </div>
                    <div class="grid grid-cols-5 gap-2">
                        <div class="col-span-3">
                            <x-label class="text-gray-800 text-md font-bold" for="fat" :value="__('Gordura')" />
                            <select id="fat" class="block mt-1 w-full rounded-md focus:border-yellow-300 focus:shadow-lg focus:ring-1 focus:ring-yellow-300" name="fat" x-model="meal.fat" :disabled="true">
                                <option value="0" selected="selected">-</option>
                                @foreach (\App\Models\Food::fatFoods() as $food)
                                    <option value="{{ $food->id }}">{{ $food->food }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-2">
                            <x-label class="text-gray-800 text-md font-bold" for="fat_weight" :value="__('Peso(g)')" />
                            <x-input id="fat_weight" class="block mt-1 w-full" type="number" name="fat_weight" x-model="meal.fatWeight" :disabled="true"/>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </form>

    <div class="flex items-center justify-end mt-4">
        <x-cancel-button class="ml-4 bg-yellow-400 hover:bg-yellow-500" href="{{ route('eating_plan', $eatingPlan->patient->user) }}">
            Voltar
        </x-cancel-button>
    </div>
</div>