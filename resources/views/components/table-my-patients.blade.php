@php

$nutritionist_collection = App\Models\Nutritionist::where('user_id', Auth::user()->id)->get();

@endphp

<table class="w-full bg-white shadow-md border-solid border-2 border-gray-200">
    <thead class="h-10 bg-gray-200 text-left">
        <th class="pl-1">Nome</th>
        <th>CPF</th>
        <th>Data de vínculo</th>
        <th class="text-center">Perfil</th>
    </thead>

    @foreach ($nutritionist_collection as $nutritionist)
        @foreach ($nutritionist->patient as $patient)
            @php
            $user_collection = App\Models\User::where('id', $patient->user_id)->get();
            @endphp

            @foreach ($user_collection as $user) 
            <tr class="h-10 hover:bg-gray-100 border-solid border border-gray-200">
                <td class="pl-1">
                    {{ $user->name }}
                </td>
                <td class="text-left">
                    {{ $user->CPF }}
                </td>
                <td class="text-left">
                    28/06/2021 (Em breve)
                </td>
                <td class="text-center">
                    </button>
                    <x-button>
                        {{ __('Acessar perfil') }}
                    </x-button>
                </td>
            </tr>
            @endforeach

        @endforeach
    @endforeach

</table>
