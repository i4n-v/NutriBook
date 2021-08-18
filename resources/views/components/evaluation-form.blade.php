@props(['evaluation'])

<form method="POST" action="{{ route('update_evaluation', $evaluation) }}" x-show="ava">
    @csrf
    <fieldset>
        <legend class="text-white text-2xl border-b-2 mb-5">Avaliação</legend>

        <!-- 'weight' -->
        <div>
            <x-label for="weight" :value="__('Peso do paciente (g)')" />
            <x-input id="weight" class="block mt-1 w-full" type="number" name="weight" :value="$evaluation->weight" required autofocus placeholder="Peso do paciente" />
        </div>

        <!-- 'height' -->
        <div>
            <x-label for="height" :value="__('Altura do paciente (m)')" />
            <x-input id="height" step="0.01" class="block mt-1 w-full" type="number" name="height" :value="$evaluation->height" required autofocus placeholder="Altura do paciente" />
        </div>

    </fieldset>

    <div class="flex items-center justify-end mt-4">
        <x-button class="ml-4">
            {{ __('Salvar') }}
        </x-button>
    </div>
</form>