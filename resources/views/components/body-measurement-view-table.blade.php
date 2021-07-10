@props(['bodyMeasurement'])

<table class="w-full bg-white shadow-lg border-solid border-b-2 rounded-sm" x-show="med">
    <thead thead class="h-10 bg-gray-700 text-white rounded-sm">
        <th colspan="2" class="rounded-tl-sm rounded-tr-sm">Medidas corporais</th>
        <th class="w-0"></th>
    </thead>
    <tbody>
        <tr class="border transition delay-150 hover:bg-gray-100 text-left">
            <td class="w-5/12 pl-2">Busto</td>
            <td class="text-center">{{ $bodyMeasurement->bust }}cm</td>
        </tr>
        <tr class="border transition delay-150 hover:bg-gray-100 text-left">
            <td class="w-5/12 pl-2">Tórax</td>
            <td class="text-center">{{ $bodyMeasurement->thorax }}cm</td>
        </tr>
        <tr class="border transition delay-150 hover:bg-gray-100 text-left">
            <td class="w-5/12 pl-2">Cintura</td>
            <td class="text-center">{{ $bodyMeasurement->waist }}cm</td>
        </tr>
        <tr class="border transition delay-150 hover:bg-gray-100 text-left">
            <td class="w-5/12 pl-2">Coxa</td>
            <td class="text-center">{{ $bodyMeasurement->thigh }}cm</td>
        </tr>
        <tr class="border transition delay-150 hover:bg-gray-100 text-left">
            <td class="w-5/12 pl-2">Panturilha</td>
            <td class="text-center">{{ $bodyMeasurement->calf }}cm</td>
        </tr>
    </tbody>
</table>