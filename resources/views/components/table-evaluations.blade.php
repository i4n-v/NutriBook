@php
    if(Auth::user()->isPatient()){
        $evaluations = App\Models\Evaluation::where('patient_id', Auth::user()->profile()->id)->get();
        $id = Auth::user()->profile()->id;
    }else{
        $evaluations = App\Models\Evaluation::where('nutritionist_id', Auth::user()->profile()->id)->where('patient_id', App\Models\User::find($_GET['patient'])->profile()->id)->get();
        $id = App\Models\User::find($_GET['patient'])->profile()->id;
    }
@endphp

<table class="w-full bg-white shadow-lg border-solid border-b-2 rounded-sm">
    <thead class="h-10 bg-gray-700 text-white rounded-sm">
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
            <td class="pl-3">
                {{ explode(' ', $evaluation->created_at)[0] }}
            </td>
            <td class="pl-3">
                {{ explode(' ', $evaluation->updated_at)[0] }}
            </td>
            <td class="flex items-center justify-center gap-4 rounded-tr-sm">
                <x-button-visual />
                @if(Auth::user()->isNutritionist())
                    <x-button-edit href="{{ route('edit_evaluation', $evaluation) }}"/>
                    <x-button-delete @click="confirm=true" />
                @endif
                <template x-if="confirm">
                    <x-modal>
                        <x-confirm-template>
                            <x-confirm-button class="px-9">Sim</x-confirm-button>
                            <x-slot name="text">{{ 'Você realmente deseja excluir a avaliação de '.explode(' ',$evaluation->patient->name)[0].'?' }}</x-slot>
                        </x-confirm-template>
                    </x-modal>
                </template>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>