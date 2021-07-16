@php

$foods = App\Models\Food::all();

@endphp

<table class="w-full bg-white shadow-lg border-solid border-b-2 rounded-sm">
    <thead class="h-10 bg-gray-700 text-white rounded-sm">
        <th class="rounded-tl-sm">Alimento</th>
        <th>Peso</th>
        <th class="rounded-tr-sm">Ações</th>
    </thead>
    <tbody>
        @foreach ($foods as $food)
        <tr class="border transition delay-150 hover:bg-gray-100 text-left rounded-sm" x-data="{ modal:false, confirm:false }">
            <td class="pl-2 rounded-bl-sm">{{ $food->food }}</td>
            <td class="pl-32">{{ $food->weight }}g</td>
            <td class="flex items-center justify-center gap-4 rounded-br-sm">
                <x-button-visual @click="modal=true" />
                <x-button-edit href="{{ route('food_edit', $food) }}" />
                <x-button-delete @click="confirm=true" />
                <template x-if="confirm">
                    <x-modal>
                        <x-confirm-template>
                            <x-confirm-button class="px-9" href="{{ route('food_delete', $food) }}">
                                Sim
                            </x-confirm-button>
                            <x-slot name="text">Você realmente deseja excluir este alimento?</x-slot>
                        </x-confirm-template>
                    </x-modal>
                </template>
                <template x-if="modal">
                    <x-modal>
                        <x-nutritional-table :food="$food" />
                    </x-modal>
                </template>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>