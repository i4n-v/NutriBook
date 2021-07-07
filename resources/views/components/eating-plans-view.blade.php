@php
    $eating_plan = \App\Models\EatingPlan::find($_GET['eating_plan']);
    $meals = $eating_plan->meals();
@endphp

<div class="w-full h-full font-semibold text-gray-900 text-md flex gap-4">
    <div class="w-1/12 grid grid-rows-7 gap-20 justify-items-start text-gray-900 text-md font-bold">  
        <div>Segunda</div>  
        <div>Terça</div>
        <div>Quarta</div>
        <div>Quinta</div>
        <div>Sexta</div>
        <div>Sábado</div>
        <div>Domingo</div>
    </div>
    <div class="w-10/12 grid grid-cols-3 grid-rows-8 gap-x-2 gap-y-5 text-white mb-0">
        <div class="bg-gray-900 shadow-md rounded-md pl-1">
            @foreach($meals->where('day', 'Monday')->get() as $meal)
                <li class="list-decimal">{{ $meal->name }}</li>
            @endforeach
        </div>
        <div class="bg-gray-900 shadow-md rounded-md pl-1">kkk</div>
        <div class="bg-gray-900 shadow-md rounded-md pl-1">kkk</div>

        <div class="bg-gray-900 shadow-md rounded-md pl-1">kkk</div>
        <div class="bg-gray-900 shadow-md rounded-md pl-1">kkk</div>
        <div class="bg-gray-900 shadow-md rounded-md pl-1">kkk</div>

        <div class="bg-gray-900 shadow-md rounded-md pl-1">kkk</div>
        <div class="bg-gray-900 shadow-md rounded-md pl-1">kkk</div>
        <div class="bg-gray-900 shadow-md rounded-md pl-1">kkk</div>

        <div class="bg-gray-900 shadow-md rounded-md pl-1">kkk</div>
        <div class="bg-gray-900 shadow-md rounded-md pl-1">kkk</div>
        <div class="bg-gray-900 shadow-md rounded-md pl-1">kkk</div>


        <div class="bg-gray-900 shadow-md rounded-md pl-1">kkk</div>
        <div class="bg-gray-900 shadow-md rounded-md pl-1">kkk</div>
        <div class="bg-gray-900 shadow-md rounded-md pl-1">kkk</div>

        <div class="bg-gray-900 shadow-md rounded-md pl-1">kkk</div>
        <div class="bg-gray-900 shadow-md rounded-md pl-1">kkk</div>
        <div class="bg-gray-900 shadow-md rounded-md pl-1">kkk</div>

        <div class="bg-gray-900 shadow-md rounded-md pl-1">kkk</div>
        <div class="bg-gray-900 shadow-md rounded-md pl-1">kkk</div>
        <div class="bg-gray-900 shadow-md rounded-md pl-1">kkk</div>
    </div>
</div>