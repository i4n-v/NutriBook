<table class="w-full bg-white shadow-md border-solid border-2 border-gray-200">
        <thead class="h-10 bg-gray-200 text-left">
            <th class="pl-1">Título</th>
            <th>Data de início</th>
            <th>Data de término</th>
            <th class="text-center">Ações</th>
        </thead>
        <tr class="h-10 border-none">
            <td class="pl-1">
                Queimando calorias
            </td>
            <td class="text-left">
                10/05/2021
            </td>
            <td class="text-left">
                28/06/2021
            </td>
            <td class="text-center">
                <x-button-delete>
                    {{ ('Apagar') }}
                </x-button-delete>
                <x-button-edit>
                    {{ ('Editar') }}
                </x-button-edit>
                <x-button>
                    {{ __('Acessar') }}
                </x-button>
            </td>
        </tr>
 </table>
