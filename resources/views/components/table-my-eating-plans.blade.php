<table class="w-full bg-white shadow-md border-solid border-2 border-gray-200">
        <thead class="h-10 bg-gray-200 text-left">
            <th class="pl-1">Título</th>
            <th>Data de início</th>
            <th>Data de término</th>
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
        </tr>
        <tr>
            <td class="text-center pb-3">
                <x-button-delete>
                    {{ ('Apagar') }}
                </x-button-delete>
            </td>
            <td class="text-center pb-3">
                <x-button>
                    {{ ('Editar') }}
                </x-button>
            </td>
            <td class="text-center pb-3">
                <x-button>
                    {{ __('Acessar') }}
                </x-button>
            </td>
        </tr>
 </table>
