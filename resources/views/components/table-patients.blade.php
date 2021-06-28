<div class="col-span-2 ml-auto w-8/12">
    <div class="pb-2 font-bold">
        Aqui estão todos os seus pacientes:
    </div>
    <table class="w-full bg-white shadow-md border-solid border-2 border-gray-200">
        <thead class="h-10 bg-gray-200 text-left">
            <th class="pl-1">Nome</th>
            <th>CPF</th>
            <th>Data de vínculo</th>
            <th class="text-center">Perfil</th>
        </thead>
        <tr class="h-10 hover:bg-gray-100 border-solid border border-gray-200">
            <td class="pl-1">
                Joselindo Bonifácio Correia Neto
            </td>
            <td class="text-left">
                114.225.439-85
            </td>
            <td class="text-left">
                28/06/2021
            </td>
            <td class="text-center">
                </button>
                <x-button>
                    {{ __('Acessar perfil') }}
                </x-button>
            </td>
        </tr>
    </table>
</div>