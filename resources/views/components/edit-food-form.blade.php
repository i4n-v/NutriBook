@php
    $food = App\Models\Food::find($_GET['edit']);
@endphp

<form method="POST" action="{{ route('food_edit') }}" class="m-auto">
    @csrf

    <fieldset>

        <legend class="text-white text-2xl border-b-2 mb-5">Alimento</legend>

        <!-- Food name -->
        <div>
            <x-label for="food" :value="__('Nome do alimento')" />

            <x-input id="food" class="block mt-1 w-full" type="text" name="food" :value="$food->food" required autofocus placeholder="Digite o nome do alimento"/>
        </div>

        <!-- Weight -->
        <div class="mt-4">
            <x-label for="weight" :value="__('Peso(g)')" />

            <x-input id="weight" class="block mt-1 w-full" type="number" name="weight" :value="$food->weight" required placeholder="Digite o peso do alimento"/>
        </div>
    </fieldset>

    <fieldset class="mt-6">
    
        <legend class="text-white text-2xl border-b-2 mt-8 mb-2">Tabela nutricional do alimento</legend>
    
        <!-- Sodium -->
        <div class="mt-4">
            <x-label for="sodium" :value="__('Sódio(mg)')" />

            <x-input id="sodium" class="block mt-1 w-full" type="number" name="sodium" :value="$food->sodium" required placeholder="Digite a quantidade de sódio"/>
        </div>

            <!-- Dietary fiber -->
            <div class="mt-4">
            <x-label for="fiber" :value="__('Fibra alimentar(g)')" />

            <x-input id="fiber" class="block mt-1 w-full" type="number" name="fiber" :value="$food->dietary_fiber" required placeholder="Digite a quantidade de fibra alimentar"/>
        </div>

        <!-- Trans fat -->
        <div class="mt-4">
            <x-label for="trans_fat" :value="__('Gordura trans(g)')" />

            <x-input id="trans_fat" class="block mt-1 w-full" type="number" name="trans_fat" :value="$food->trans_fat" required placeholder="Digite a quantidade de gordura trans"/>
        </div>

        <!-- Saturated fat -->
        <div class="mt-4">
            <x-label for="saturated_fat" :value="__('Gordura saturadas(g)')" />

            <x-input id="saturated_fat" class="block mt-1 w-full" type="number" name="saturated_fat" :value="$food->saturated_fat" required placeholder="Digite a quantidade de gordura saturadas"/>
        </div>

        <!-- Total fat -->
        <div class="mt-4">
            <x-label for="total_fat" :value="__('Gordura totais(g)')" />

            <x-input id="total_fat" class="block mt-1 w-full" type="number" name="total_fat" :value="$food->total_fat" required placeholder="Digite a quantidade de gorduras totais"/>
        </div>

        <!-- Protein -->
        <div class="mt-4">
            <x-label for="protein" :value="__('Proteínas(g)')" />

            <x-input id="protein" class="block mt-1 w-full" type="number" name="protein" :value="$food->protein" required placeholder="Digite a quantidade de proteínas"/>
        </div>

        <!-- Carbohydrate -->
        <div class="mt-4">
            <x-label for="carbohydrate" :value="__('Carboidratos(g)')" />

            <x-input id="carbohydrate" class="block mt-1 w-full" type="number" name="carbohydrate" :value="$food->carbohydrate" required placeholder="Digite a quantidade de carboidratos"/>
        </div>

        <!-- Energetic value -->
        <div class="mt-4">
            <x-label for="energetic_value" :value="__('Valor energético(kcal)')" />

            <x-input id="energetic_value" class="block mt-1 w-full" type="number" name="energetic_value" :value="$food->energetic_value" required placeholder="Digite o valor energético"/>
        </div>
    </fieldset>
    
    <div class="flex items-center justify-end mt-4">
        <x-cancel-button href="/foods">
            Cancelar
        </x-cancel-button>

        <x-button class="ml-4">
            {{ __('Editar') }}
        </x-button>
    </div>
</form>