<form method="POST" action="{{ route('create_skinfold')}}">
	@csrf
	<fieldset>
		<legend class="text-white text-2xl border-b-2 mb-5">Dobras Cutâneas</legend>
	
            
         <!-- breastplate -->

             <div>
            <x-label for="breastplate" :value="__('Peitoral')"/>
            <x-input id="breastplate" class="block mt-1 w-full" type="text" name="breastplate" required autofocus placeholder="Digite o tamanho de Peitoral do paciente"/>
           </div>

         <!-- biceps -->
        
            <div>
            <x-label for="biceps" :value="__('Bíceps')"/>
            <x-input id="biceps" class="block mt-1 w-full" type="text" name="biceps"  required autofocus placeholder="Digite o tamanho dos Bíceps do paciente"/>
             </div>


         <!-- triceps -->

            <div>
            <x-label for="triceps" :value="__('Trícep')"/>
            <x-input id="triceps" class="block mt-1 w-full" type="text" name="triceps"  required autofocus placeholder="Digite o tamanho dos Tríceps do paciente"/>
             </div>

         <!-- abdominal -->

             <div>
            <x-label for="abdominal" :value="__('Abdômen')"/>
            <x-input id="abdominal" class="block mt-1 w-full" type="text" name="abdominal"  required autofocus placeholder="Digite a medida de Abdômen do paciente"/>
             </div>

         <!--subscapular -->

            <div>
            <x-label for="subscapular" :value="__('Subescapular')"/>
            <x-input id="subscapular" class="block mt-1 w-full" type="text" name="subscapular"  required autofocus placeholder="Digite o tamanho de Subescapular do paciente"/>
             </div>

         <!-- suprailiaco -->

             <div>
            <x-label for="suprailiaco" :value="__('Suprailíaco')"/>
            <x-input id="suprailiaco" class="block mt-1 w-full" type="text" name="suprailiaco"  required autofocus placeholder="Digite a medida de Suprailíaco do paciente"/>
             </div>

         <!-- middle_axillary -->

             <div>
            <x-label for="middle_axillary" :value="__('Auxíliar Médio')"/>
            <x-input id="middle_axillary" class="block mt-1 w-full" type="text" name="middle_axillary"  required autofocus placeholder="Digite o tamanho de Auxiliar Médio do paciente"/>
             </div>

         <!--thigh -->

             <div>
            <x-label for="thigh" :value="__('Coxa')"/>
            <x-input id="thigh" class="block mt-1 w-full" type="text" name="thigh"  required autofocus placeholder="Digite a medida de Coxa do paciente"/>
             </div>

          <!--calf -->

          <div>
            <x-label for="calf" :value="__('Panturrilha')"/>
            <x-input id="calf" class="block mt-1 w-full" type="text" name="calf"  required autofocus placeholder="Digite a medida de Panturrilha do paciente"/>
             </div>

         <!-- Lumbar -->

             <div>
            <x-label for="lumbar" :value="__('Lombar')"/>
            <x-input id="lumbar" class="block mt-1 w-full" type="text" name="lumbar"  required autofocus placeholder="Digite o tamanho da Lombar do paciente"/>
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