@props(['food'])

<div class="w-11/12 m-auto">
    <div class="text-white bg-gray-800 p-1 rounded-tl-sm rounded-tr-sm text-center font-bold">
        <span>Tabela nutricional</span>
    </div>
    <div class="m-auto rounded-lg grid grid-cols-2 border">  
        <div class="pl-2 border-b">Sódio</div><div class="pl-20 border-b">{{ $food->sodium }}mg</div>
        <div class="pl-2 border-b bg-gray-200">Fibra alimentar</div><div class="pl-20 border-b bg-gray-200">{{ $food->dietary_fiber }}g</div>
        <div class="pl-2 border-b">Gorduras trans</div><div class="pl-20 border-b">{{ $food->trans_fat }}g</div>
        <div class="pl-2 border-b bg-gray-200">Gorduras saturadas</div><div class="pl-20 border-b bg-gray-200">{{ $food->saturated_fat }}g</div>
        <div class="pl-2 border-b">Gorduras totais</div><div class="pl-20 border-b">{{ $food->total_fat }}g</div>
        <div class="pl-2 border-b bg-gray-200">Proteína</div><div class="pl-20 border-b bg-gray-200">{{ $food->protein }}g</div>
        <div class="border-b pl-2">Carboidratos</div><div class="border-b pl-20">{{ $food->carbohydrate }}g</div>
        <div class="pl-2 border-b bg-gray-200">Valor energético</div><div class="pl-20 border-b bg-gray-200">{{ $food->energetic_value }}g</div>
    </div>
</div>             