@props(['evaluation'])

<table class="w-full bg-white shadow-lg border-solid border-b-2 rounded-sm" x-show="ava">
    <thead thead class="h-10 bg-gray-700 text-white rounded-sm">
        <th colspan="2" class="rounded-tl-sm rounded-tr-sm">Avaliação</th>
        <th class="w-0"></th>
    </thead>
    <tbody>
        <tr class="border transition delay-150 hover:bg-gray-100 text-left">
            <td class="w-5/12 pl-2">Nutricionista</td>
            <td>{{ $evaluation->nutritionist->user->name }}</td>
        </tr>
        <tr class="border transition delay-150 hover:bg-gray-100 text-left">
            <td class="w-5/12 pl-2">Paciente</td>
            <td>{{ $evaluation->patient->user->name }}</td>
        </tr>
        <tr class="border transition delay-150 hover:bg-gray-100 text-left">
            <td class="w-5/12 pl-2">Peso</td>
            <td>{{ $evaluation->weight }}g</td>
        </tr>
        <tr class="border transition delay-150 hover:bg-gray-100 text-left">
            <td class="w-5/12 pl-2">Altura</td>
            <td>{{ $evaluation->height }}m</td>
        </tr>
    </tbody>
</table>