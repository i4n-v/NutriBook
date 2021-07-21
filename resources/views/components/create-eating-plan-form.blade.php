@props(['patient'])

<form method="POST" action="{{ route('eatingplan_create', $patient) }}">
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

    <fieldset class="mt-6">
        <legend class="text-white text-xl border-b-2 mb-5">Refeições</legend>

         <!-- Meals 1 -->
         <div class="mt-4">
            <x-label for="meal-1" :value="__('Alimento(Proteína)')" />

            <select id="meal-1" class="block mt-1 w-full rounded-md focus:border-yellow-300 focus:shadow-lg focus:ring-1 focus:ring-yellow-300" name="meal-1" required autofocus>
                <option value="volvo">Volvo</option>
            </select>
        </div>

    </fieldset>

    <div class="flex items-center justify-end mt-4">
        <x-cancel-button href="{{ route('eating_plan', $patient->user) }}">
            Cancelar
        </x-cancel-button>

        <x-add-button class="ml-4 px-8">
            {{ __('Criar') }}
        </x-add-button>
    </div>
</form>