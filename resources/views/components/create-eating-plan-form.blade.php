@props(['patient'])

<div x-data="eatingPlan">
    <form x-ref="planForm" x-on:submit.prevent="savePlan('{{ route('eatingplan_create', $patient) }}')">
        @csrf
        <fieldset class="mt-10">
            <legend class="text-white text-xl border-b-2 mb-5">Dados do plano alimentar</legend>

            <!-- Title -->
            <div class="mt-4">
                <x-label for="title" :value="__('Título')" />

                <x-input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus placeholder="Digite o título"/>
            </div>

            <!-- Date Start -->
            <div class="mt-4">
                <x-label for="date-start" :value="__('Data de início')" />

                <x-input id="date-start" class="block mt-1 w-full" type="date" name="date_start" required autofocus
                />
            </div>

            <!-- Date Finish -->
            <div class="mt-4">
                <x-label for="date-finish" :value="__('Data de fim')" />

                <x-input id="date-finish" class="block mt-1 w-full" type="date" name="date_finish" required autofocus
                />
            </div>
        </fieldset>
        <input type="submit">
    </form>

    <fieldset class="mt-6">
        <legend class="text-white text-xl border-b-2 mb-5">Refeições</legend>

        <!-- Meals 1 -->
        <template x-for="refeicao in refeicoes">
            <div class="mt-4">

                <h3 class="text-black text-md mb-2">
                    <input type="text" x-model="refeicao.nome">
                </h3>

                <div class="grid grid-cols-3 gap-5">
                    <div>
                        <x-label for="meal-1" :value="__('Carboidrato')" />

                        <select id="meal-1" class="block mt-1 w-full rounded-md focus:border-yellow-300 focus:shadow-lg focus:ring-1 focus:ring-yellow-300" name="meal-1" required autofocus x-model="refeicao.carbo">
                            @foreach (\App\Models\Food::all() as $food)
                                <option value="{{ $food->id }}">{{ $food->food }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-label for="meal-1" :value="__('Proteína')" />

                        <select id="meal-1" class="block mt-1 w-full rounded-md focus:border-yellow-300 focus:shadow-lg focus:ring-1 focus:ring-yellow-300" name="meal-1" required autofocus>
                            <option value="volvo">Volvo</option>
                        </select>
                    </div>

                    <div>
                        <x-label for="meal-1" :value="__('Gordura')" />

                        <select id="meal-1" class="block mt-1 w-full rounded-md focus:border-yellow-300 focus:shadow-lg focus:ring-1 focus:ring-yellow-300" name="meal-1" required autofocus>
                            <option value="volvo">Volvo</option>
                        </select>
                    </div>
                </div>
            </div>
        </template>

        <div class="bg-yellow-400 rounded-md text-center mt-5 transition delay-150 hover:bg-yellow-500 cursor-pointer shadow-md">
            <span class="w-full text-gray-900 font-bold" x-on:click="addRefeicao">Adicionar refeição</span>
        </div>

    </fieldset>

    <div class="flex items-center justify-end mt-4">
        <x-cancel-button href="{{ route('eating_plan', $patient->user) }}">
            Cancelar
        </x-cancel-button>

        <x-add-button class="ml-4 px-8" x-on:click="saveRefeicoes">
            {{ __('Criar') }}
        </x-add-button>
    </div>
</div>