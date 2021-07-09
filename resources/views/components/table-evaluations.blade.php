@php

if(Auth::user()->isPatient()){
    $evaluations = App\Models\Evaluation::where('patient_id', Auth::user()->profile()->id)->get();
}else{
    $evaluations = App\Models\Evaluation::where('patient_id', App\Models\User::find($_GET['patient'])->profile()->id)->get();
}

@endphp

<table class="w-full bg-white shadow-lg border-solid border-b-2 rounded-sm">
    <thead class="h-10 bg-gray-700 text-white rounded-sm">
        <th class="rounded-tl-sm">
            @if(Auth::user()->isPatient())
            <x-ordering-selector>
                {{ __('Nutricionista') }}
            </x-ordering-selector>
            @else
            <x-ordering-selector>
                {{ __('Paciente') }}
            </x-ordering-selector>
            @endif
        </th>
        <th>
            <x-ordering-selector>
                {{ __('Data da avaliação') }}
            </x-ordering-selector>
        </th>
        <th>
            <x-ordering-selector>
                {{ __('Data de atualização') }}
            </x-ordering-selector>
        </th>
        <th class="rounded-tr-sm">Ações</th>
    </thead>
    <tbody>
        @foreach ($evaluations as $evaluation)
        <tr class="border transition delay-150 hover:bg-gray-100 text-left" x-data="{ confirm:false }">

            <td class="pl-2 rounded-tl-sm">
                @if(Auth::user()->isPatient())
                {{ $evaluation->nutritionist->user->name }}
                @else
                {{ $evaluation->patient->user->name }}
                @endif
            </td>
            <td class="pl-3">
                {{ explode(' ', $evaluation->created_at)[0] }}
            </td>
            <td class="pl-3">
                {{ explode(' ', $evaluation->updated_at)[0] }}
            </td>
            <td class="flex items-center justify-center gap-4 rounded-tr-sm">
                <x-button-visual />
                <x-button-edit />
                <x-button-delete @click="confirm=true" />
                <template x-if="confirm">
                    <x-modal>
                        <x-confirm-template>
                            <x-confirm-button class="px-5">Sim</x-confirm-button>
                        </x-confirm-template>
                    </x-modal>
                </template>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>