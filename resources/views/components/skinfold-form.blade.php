<form method="POST" action="{{ route('create_skinfold')}}" x-show="dob">
	@csrf
	<fieldset>
		<legend class="text-white text-2xl border-b-2 mb-5">Dobras Cutâneas</legend>
	

        <div class="grid grid-cols-2 gap-5 w-full">    
            <!-- breastplate -->

            <div>
                <x-label for="breastplate" :value="__('Peitoral')"/>
                <x-input id="breastplate" class="block mt-1 w-full" type="number" name="breastplate" required autofocus placeholder="Medida do Peitoral"/>
            </div>

            <!-- biceps -->
        
            <div>
                <x-label for="biceps" :value="__('Bíceps')"/>
                <x-input id="biceps" class="block mt-1 w-full" type="number" name="biceps"  required autofocus placeholder="Medida dos Bíceps"/>
            </div>


            <!-- triceps -->

            <div>
                <x-label for="triceps" :value="__('Trícep')"/>
                <x-input id="triceps" class="block mt-1 w-full" type="number" name="triceps"  required autofocus placeholder="Medida do Tríceps"/>
            </div>

            <!-- abdominal -->

            <div>
                <x-label for="abdominal" :value="__('Abdômen')"/>
                <x-input id="abdominal" class="block mt-1 w-full" type="number" name="abdominal"  required autofocus placeholder="Medida do Abdômen"/>
            </div>

            <!--subscapular -->

            <div>
                <x-label for="subscapular" :value="__('Subescapular')"/>
                <x-input id="subscapular" class="block mt-1 w-full" type="number" name="subscapular"  required autofocus placeholder="Medida da Subescapular"/>
            </div>

            <!-- suprailiaco -->

            <div>
                <x-label for="suprailiaco" :value="__('Suprailíaco')"/>
                <x-input id="suprailiaco" class="block mt-1 w-full" type="number" name="suprailiaco"  required autofocus placeholder="Medida do Suprailíaco"/>
            </div>

            <!-- middle_axillary -->

            <div>
                <x-label for="middle_axillary" :value="__('Axíliar Médio')"/>
                <x-input id="middle_axillary" class="block mt-1 w-full" type="number" name="middle_axillary"  required autofocus placeholder="Medida do Axiliar Médio"/>
            </div>

            <!--thigh -->

            <div>
                <x-label for="thigh" :value="__('Coxa')"/>
                <x-input id="thigh" class="block mt-1 w-full" type="number" name="thigh"  required autofocus placeholder="Medida da Coxa"/>
            </div>

            <!--calf -->

            <div>
                <x-label for="calf" :value="__('Panturrilha')"/>
                <x-input id="calf" class="block mt-1 w-full" type="number" name="calf"  required autofocus placeholder="Medida da Panturrilha"/>
            </div>

            <!-- Lumbar -->

            <div>
                <x-label for="lumbar" :value="__('Lombar')"/>
                <x-input id="lumbar" class="block mt-1 w-full" type="number" name="lumbar"  required autofocus placeholder="Medida da Lombar"/>
            </div>
        </div>
	</fieldset>
    
        <div class="flex items-center justify-end mt-4">
            <x-button class="ml-4">
                {{ __('Salvar') }}
            </x-button>
        </div>
</form>