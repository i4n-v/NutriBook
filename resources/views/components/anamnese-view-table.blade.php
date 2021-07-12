@props(['anamnese'])

<table class="w-full bg-white shadow-lg border-solid border-b-2 rounded-sm" x-show="ana">
    <thead thead class="h-10 bg-gray-700 text-white rounded-sm">
        <th colspan="2" class="rounded-tl-sm rounded-tr-sm">Anamnese</th>
        <th class="w-0"></th>
    </thead>
    <tbody>
        <tr class="border transition delay-150 hover:bg-gray-100 text-left">
            <td class="w-5/12 pl-2">Objetivo</td>
            <td>{{ $anamnese->objective }}</td>
        </tr>
        <tr class="border transition delay-150 hover:bg-gray-100 text-left">
            <td class="w-5/12 pl-2">Histórico patológico</td>
            <td>{{ $anamnese->pathological_history }}</td>
        </tr>
        <tr class="border transition delay-150 hover:bg-gray-100 text-left">
            <td class="w-5/12 pl-2">Histórico familiar</td>
            <td>{{ $anamnese->family_history }}</td>
        </tr>
        <tr class="border transition delay-150 hover:bg-gray-100 text-left">
            <td class="w-5/12 pl-2">Rémedios utilizados</td>
            <td>{{ $anamnese->used_drugs }}</td>
        </tr>
        <tr class="border transition delay-150 hover:bg-gray-100 text-left">
            <td class="w-5/12 pl-2">Estilo de vida</td>
            <td>{{ $anamnese->life_style }}</td>
        </tr>
    </tbody>
</table>