<form method="POST" action="{{ route('create_bodymeasurement')}}">
	@csrf
	<fieldset>
		<legend class="text-white text-2xl border-b-2 mb-5">Medidas Corporais</legend>
	
            
          <!--  bust -->

             <div>
            <x-label for="bust" :value="__('Busto')"/>
            <x-input id="bust" class="block mt-1 w-full" type="text" name="bust" required autofocus placeholder="Digite o tamanho de Busto do paciente"/>
           </div>

     <!-- thorax -->
    
             <div>
            <x-label for="thorax" :value="__('Tórax')"/>
            <x-input id="thorax" class="block mt-1 w-full" type="text" name="thorax" required autofocus placeholder="Digite o tamanho de Tórax do paciente"/>
           </div>


        
      <!-- waist -->

             <div>
            <x-label for="waist" :value="__('Cintura')"/>
            <x-input id="waist" class="block mt-1 w-full" type="text" name="waist" required autofocus placeholder="Digite o tamanho de Cintura do paciente"/>
           </div>



      <!-- thigh -->

             <div>
            <x-label for="thigh" :value="__('Coxa')"/>
            <x-input id="thigh" class="block mt-1 w-full" type="text" name="thigh" required autofocus placeholder="Digite o tamanho de Coxa do paciente"/>
           </div>



      <!-- calf -->

             <div>
            <x-label for="calf" :value="__('Panturrilha')"/>
            <x-input id="calf" class="block mt-1 w-full" type="text" name="calf" required autofocus placeholder="Digite o tamanho da Panturrilha do paciente"/>
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