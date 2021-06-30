@php

$foods = App\Models\Food::all();

@endphp

<table class="w-full bg-white shadow-md border-solid border-2 border-gray-200">
    <thead class="h-10 bg-gray-200 text-left">
        <th class="pl-2">Alimento</th>
        <th>Peso</th>
        <th class="text-center">Tabela nutricional</th>
        <th class="text-center">Ações</th>
    </thead>

    @foreach ($foods as $food)
        <tr class="h-10 hover:bg-gray-100 border-solid border border-gray-200 px-2">
            <td class="pl-2">
                {{ $food->food }}
            </td>
            <td class="text-left">
                {{ $food->weight }}g
            </td>
            <td class="text-center w-3/12">
                <x-button>
                    {{ __('Visualizar') }}
                </x-button>
            </td>
            <td class="text-center w-4/12">
                <x-button-delete>
                    {{ __('Apagar') }}
                </x-button-delete>
                <x-button-edit>
                    {{ __('Editar') }}
                </x-button-edit>
            </td>
        </tr>
    @endforeach

</table>
