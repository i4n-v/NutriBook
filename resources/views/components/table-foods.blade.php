@php

$foods = App\Models\Food::all();

@endphp

<table class="w-full bg-white shadow-lg border-solid border-b-2 rounded-sm">
    <thead class="h-10 bg-gray-700 text-white rounded-sm">
        <th class="rounded-tl-sm">Alimento</th>
        <th>Peso</th>
        <th class="rounded-tr-sm">Ações</th>
    </thead>
    <thead>
        @foreach ($foods as $food)         
                <tr class="border transition delay-150 hover:bg-gray-100 text-left rounded-sm" x-data="{ modal:false }">
                    <td class="pl-2 rounded-bl-sm">{{ $food->food }}</td>
                    <td class="pl-32">{{ $food->weight }}g</td>
                    <td class="flex items-center justify-center gap-4 rounded-br-sm">
                        <x-button-visual @click="modal=true"/>
                        <x-button-edit href="{{ route('food_redirect_edit', $food) }}"/>
                        <x-button-delete href="{{ route('food_delete', $food) }}"/>
                        <x-modal>
                            <x-nutritional-table :food="$food"/>
                        </x-modal>
                    </td>
                </tr>
        @endforeach
    </thead>
</table>