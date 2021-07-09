<form method="POST" action="{{ route('create_bodymeasurement')}}" x-show="med">
    @csrf
    <fieldset>
        <legend class="text-white text-2xl border-b-2 mb-5">Medidas Corporais</legend>

        <!--  bust -->

        <div>
            <x-label for="bust" :value="__('Busto')" />
            <x-input id="bust" class="block mt-1 w-full" type="number" name="bust" required autofocus placeholder="Medida do Busto" />
        </div>

        <!-- thorax -->

        <div>
            <x-label for="thorax" :value="__('Tórax')" />
            <x-input id="thorax" class="block mt-1 w-full" type="number" name="thorax" required autofocus placeholder=" Medida do Tórax " />
        </div>

        <!-- waist -->

        <div>
            <x-label for="waist" :value="__('Cintura')" />
            <x-input id="waist" class="block mt-1 w-full" type="number" name="waist" required autofocus placeholder="Medida da Cintura" />
        </div>

        <!-- thigh -->

        <div>
            <x-label for="thigh" :value="__('Coxa')" />
            <x-input id="thigh" class="block mt-1 w-full" type="number" name="thigh" required autofocus placeholder="Medida da Coxa" />
        </div>

        <!-- calf -->

        <div>
            <x-label for="calf" :value="__('Panturrilha')" />
            <x-input id="calf" class="block mt-1 w-full" type="number" name="calf" required autofocus placeholder="Medida da panturrilha" />
        </div>

    </fieldset>

    <div class="flex items-center justify-end mt-4">
        <x-button class="ml-4">
            {{ __('Salvar') }}
        </x-button>
    </div>

</form>