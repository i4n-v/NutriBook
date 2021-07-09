<form method="POST" action="{{ route('create_evaluation')}}" x-show="ava">
    @csrf
    <fieldset>
        <legend class="text-white text-2xl border-b-2 mb-5">Avaliação</legend>

        <!-- 'weight' -->
        <div>
            <x-label for="weight" :value="__('Peso do Paciente')" />
            <x-input id="weight" class="block mt-1 w-full" type="number" name="weight" required autofocus placeholder="Peso do Paciente " />
        </div>

        <!-- 'height' -->
        <div>
            <x-label for="height" :value="__('Altura do Paciente')" />
            <x-input id="height" class="block mt-1 w-full" type="number" name="height" required autofocus placeholder="Altura do Paciente " />
        </div>

    </fieldset>

    <div class="flex items-center justify-end mt-4">
        <x-button class="ml-4">
            {{ __('Salvar') }}
        </x-button>
    </div>

</form>