<form method="POST" action="{{ route('create_evaluation')}}">
	@csrf
	<fieldset>
		<legend class="text-white text-2xl border-b-2 mb-5">Avaliação</legend>
	
            <!-- 'weight' -->
             <div>
            <x-label for="weight" :value="__('Peso do Paciente')"/>
            <x-input id="weight" class="block mt-1 w-full" type="text" name="weight" required autofocus placeholder="Digite o peso do Paciente "/>
           </div>

            <!-- 'height' -->
            <div>
            <x-label for="height" :value="__('Altura do Paciente')"/>
            <x-input id="height" class="block mt-1 w-full" type="text" name="height"  required autofocus placeholder="Digite a altura do Paciente "/>
             </div>
        

        <div class="flex items-center justify-end mt-4">
                <x-cancel-button>
                    Cancelar
                </x-cancel-button>

                <x-button class="ml-4">
                    {{ __('Criar') }}
                </x-button>

             </div>


	</fieldset>
</form>