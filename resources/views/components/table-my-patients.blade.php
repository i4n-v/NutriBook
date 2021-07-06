@php

$nutritionist_collection = App\Models\Nutritionist::where('user_id', Auth::user()->id)->get();

@endphp

<table class="w-full bg-white shadow-lg border-solid border-b-2 rounded-sm">
    <thead class="h-10 bg-gray-700 text-white rounded-sm">
        <th class="rounded-tl-sm">
            <x-ordering-selector>
                {{ __('Nome') }}
            </x-ordering-selector>
        </th>
        <th>
            <x-ordering-selector>
                {{ __('CPF') }}
            </x-ordering-selector>
        </th>
        <th>
            <x-ordering-selector>
                {{ __('Data de vínculo') }}
            </x-ordering-selector>
        </th>
        <th class="rounded-tr-sm">Perfil</th>
    </thead>

    @foreach ($nutritionist_collection as $nutritionist)
        @foreach ($nutritionist->patient as $patient)
            @php
            $user_collection = App\Models\User::where('id', $patient->user_id)->get();
            @endphp

            @foreach ($user_collection as $user) 
            <tr class="border transition delay-150 hover:bg-gray-100 text-left">
                <td class="pl-2 rounded-tl-sm">
                    {{ $user->name }}
                </td>
                <td class="text-left">
                    {{ $user->CPF }}
                </td>
                <td class="text-left">
                    28/06/2021 (Em breve)
                </td>
                <td class="text-center w-2/12 rounded-tr-sm">
                    <x-button-visual href="#"/>
                </td>
            </tr>
            @endforeach

        @endforeach
    @endforeach

</table>
