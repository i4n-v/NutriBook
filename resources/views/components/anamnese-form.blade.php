@props(['anamnese'])

<form method="POST" action="{{ route('create_anamnese')}}" x-show="ana">
    @csrf
    <fieldset>
        <legend class="text-white text-2xl border-b-2 mb-5">Anamnese</legend>

        <!--objective -->

        <div>
            <x-label for="objective" :value="__('Objetivo')" />
            <x-input id="objective" class="block mt-1 w-full" type="text" name="objective" :value="$anamnese->objective" required autofocus placeholder="Objetivo do paciente" />
        </div>

        <!--pathological_history -->

        <div>
            <x-label for="pathological_history" :value="__('Histórico Patológico')" />
            <x-input id="pathological_history" class="block mt-1 w-full" type="text" name="pathological_history" :value="$anamnese->pathological_history" required autofocus placeholder="Histórico Patológico do paciente" />
        </div>

        <!--family_history -->

        <div>
            <x-label for="family_history" :value="__('Histórico Familiar')" />
            <x-input id="family_history" class="block mt-1 w-full" type="text" name="family_history" :value="$anamnese->family_history" required autofocus placeholder="Histórico familiar do paciente" />
        </div>

        <!--used_drugs -->

        <div>
            <x-label for="used_drugs" :value="__('Uso de Remédios')" />
            <x-input id="used_drugs" class="block mt-1 w-full" type="text" name="used_drugs" :value="$anamnese->used_drugs" required autofocus placeholder="Rémedios utilizados pelo paciente" />
        </div>

        <!--life_style -->

        <div>
            <x-label for="life_style" :value="__('Estilo de Vida')" />
            <x-input id="life_style" class="block mt-1 w-full" type="text" name="life_style" :value="$anamnese->life_style" required autofocus placeholder="Estilo de Vida do paciente" />
        </div>
    </fieldset>

    <div class="flex items-center justify-end mt-4">
        <x-button class="ml-4">
            {{ __('Salvar') }}
        </x-button>
    </div>

</form>