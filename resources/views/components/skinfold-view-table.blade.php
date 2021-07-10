@props(['skinFold'])

<table class="w-full bg-white shadow-lg border-solid border-b-2 rounded-sm" x-show="dob">
    <thead thead class="h-10 bg-gray-700 text-white rounded-sm">
        <th colspan="2" class="rounded-tl-sm rounded-tr-sm">Dobras cutâneas</th>
        <th class="w-0"></th>
    </thead>
    <tbody>
        <tr class="border transition delay-150 hover:bg-gray-100 text-left">
            <td class="w-5/12 pl-2">Peitoral</td>
            <td class="text-center">{{ $skinFold->breastplate }}mm</td>
        </tr>
        <tr class="border transition delay-150 hover:bg-gray-100 text-left">
            <td class="w-5/12 pl-2">Bíceps</td>
            <td class="text-center">{{ $skinFold->biceps }}cm</td>
        </tr>
        <tr class="border transition delay-150 hover:bg-gray-100 text-left">
            <td class="w-5/12 pl-2">Tríceps</td>
            <td class="text-center">{{ $skinFold->triceps }}cm</td>
        </tr>
        <tr class="border transition delay-150 hover:bg-gray-100 text-left">
            <td class="w-5/12 pl-2">Abdômen</td>
            <td class="text-center">{{ $skinFold->abdominal }}cm</td>
        </tr>
        <tr class="border transition delay-150 hover:bg-gray-100 text-left">
            <td class="w-5/12 pl-2">Subescapular</td>
            <td class="text-center">{{ $skinFold->subscapular }}cm</td>
        </tr>
        <tr class="border transition delay-150 hover:bg-gray-100 text-left">
            <td class="w-5/12 pl-2">Suprailíaco</td>
            <td class="text-center">{{$skinFold->suprailiaco }}cm</td>
        </tr>
        <tr class="border transition delay-150 hover:bg-gray-100 text-left">
            <td class="w-5/12 pl-2">Axílar médio</td>
            <td class="text-center">{{ $skinFold->middle_axillary}}cm</td>
        </tr>
        <tr class="border transition delay-150 hover:bg-gray-100 text-left">
            <td class="w-5/12 pl-2">Coxa</td>
            <td class="text-center">{{ $skinFold->thigh }}cm</td>
        </tr>
        <tr class="border transition delay-150 hover:bg-gray-100 text-left">
            <td class="w-5/12 pl-2">Panturilha</td>
            <td class="text-center">{{ $skinFold->calf }}cm</td>
        </tr>
        <tr class="border transition delay-150 hover:bg-gray-100 text-left">
            <td class="w-5/12 pl-2">Lombar</td>
            <td class="text-center">{{ $skinFold->lumbar }}cm</td>
        </tr>
    </tbody>
</table>