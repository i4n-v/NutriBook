@php

$foods = App\Models\Food::all();

@endphp

@foreach ($foods as $food)
    <table class="w-9/12 bg-white shadow-lg border-solid border-b-2 mb-10">
        <thead class="h-10 bg-gray-700">
            <th class="text-left pl-2 font-bold text-xl text-white">
                {{ $food->food }}
            </th>
            <th class="pr-1">
                <span class="float-right">
                    <x-button-delete href="{{ route('food_delete', $food) }}">
                        {{ __('Apagar') }}
                    </x-button-delete>
                    <x-button-edit>
                        {{ __('Editar') }}
                    </x-button-edit>
                </span>
            </th>
        </thead>
        <tbody>
            <tr class="h-8 hover:bg-gray-100 border-solid border border-gray-200 px-2 text-left">
                <td class="w-6/12 font-semibold pl-2">Peso</td>
                <td class="pl-20">{{ $food->weight }}g</td>
            </tr>
            <tr class="h-8 hover:bg-gray-100 border-solid border border-gray-200 px-2 text-left bg-gray-100">
                <td class="w-6/12 font-semibold pl-2">Sódio</td>
                <td class="pl-20">{{ $food->sodium }}mg</td>
            </tr>
            <tr class="h-8 hover:bg-gray-100 border-solid border border-gray-200 px-2 text-left">
                <td class="w-6/12 font-semibold pl-2">Fibra alimentar</td>
                <td class="pl-20">{{ $food->dietary_fiber }}g</td>
            </tr>
            <tr class="h-8 hover:bg-gray-100 border-solid border border-gray-200 px-2 text-left bg-gray-100">
                <td class="w-6/12 font-semibold pl-2">Gorduras trans</td>
                <td class="pl-20">{{ $food->trans_fat }}g</td>
            </tr>
            <tr class="h-8 hover:bg-gray-100 border-solid border border-gray-200 px-2 text-left">
                <td class="w-6/12 font-semibold pl-2">Gorduras saturadas</td>
                <td class="pl-20">{{ $food->saturated_fat }}g</td>
            </tr>
            <tr class="h-8 hover:bg-gray-100 border-solid border border-gray-200 px-2 text-left bg-gray-100">
                <td class="w-6/12 font-semibold pl-2">Gorduras totais</td>
                <td class="pl-20">{{ $food->total_fat }}g</td>
            </tr>
            <tr class="h-8 hover:bg-gray-100 border-solid border border-gray-200 px-2 text-left">
                <td class="w-6/12 font-semibold pl-2">Proteínas</td>
                <td class="pl-20">{{ $food->protein }}g</td>
            </tr>
            <tr class="h-8 hover:bg-gray-100 border-solid border border-gray-200 px-2 text-left bg-gray-100">
                <td class="w-6/12 font-semibold pl-2">Carboidratos</td>
                <td class="pl-20">{{ $food->carbohydrate}}g</td>
            </tr>
            <tr class="h-8 hover:bg-gray-100 border-solid border border-gray-200 px-2 text-left">
                <td class="w-6/12 font-semibold pl-2">Valor energético</td>
                <td class="pl-20">{{ $food->energetic_value}}g</td>
            </tr>
        </tbody>
    </table>
@endforeach
