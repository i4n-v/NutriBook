@php

$foods = App\Models\Food::all();

@endphp

<table class="w-full bg-white shadow-lg border-solid border-b-2">
    <thead class="h-10 bg-gray-700 text-white">
        <th>Alimento</th>
        <th>Peso</th>
        <th>Ações</th>
    </thead>
    <thead>
        @foreach ($foods as $food)
            <div x-data="{ modal:false }">
                <tr class="border transition delay-150 hover:bg-gray-100 text-left">
                    <td class="pl-2">{{ $food->food }}</td>
                    <td class="pl-32">{{ $food->weight }}g</td>
                    <td class="flex items-center justify-center gap-4">
                        <x-button-visual @click="modal=true"/>
                        <x-button-edit href="{{ route('food_redirect_edit', $food) }}"/>
                        <x-button-delete href="{{ route('food_delete', $food) }}"/>
                    </td>
                </tr>

                <!-- <x-modal>
                    <x-nutritional-table :food="$food"/>
                </x-modal> -->
            </div>
        @endforeach
    </thead>
</table>