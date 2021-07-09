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

        <!-- Segunda -->
        <div class="bg-gray-900 shadow-md rounded-md p-2">
           <ul>
                <li>Torrada integral</li>
                <li>Frutas cortadas</li>
                <li>Suco frutas</li>
           </ul>
        </div>
        <div class="bg-gray-900 shadow-md rounded-md p-2">
            <ul>
                <li>Feijão com arroz</li>
                <li>Frango</li>
                <li>Salada</li>
                <li>Suco de frutas</li>
           </ul>
        </div>
        <div class="bg-gray-900 shadow-md rounded-md p-2">
             <ul>
                <li>Creme de cenoura</li>
                <li>Pescada no forno</li>
                <li>Batata cozida</li>
                <li>suco de frutas</li>
           </ul>
        </div>

        <!-- Terça -->
        <div class="bg-gray-900 shadow-md rounded-md p-2">
            <ul>
                <li>Torrada integral</li>
                <li>Frutas cortadas</li>
                <li>Suco frutas</li>
           </ul>
        </div>
        <div class="bg-gray-900 shadow-md rounded-md p-2">
             <ul>
                <li>Feijão com arroz</li>
                <li>Frango</li>
                <li>Salada</li>
                <li>Suco de frutas</li>
           </ul>
        </div>
        <div class="bg-gray-900 shadow-md rounded-md p-2">
            <ul>
                <li>Creme de cenoura</li>
                <li>Pescada no forno</li>
                <li>Batata cozida</li>
                <li>suco de frutas</li>
           </ul>
        </div>

        <!-- Quarta -->
        <div class="bg-gray-900 shadow-md rounded-md p-2">
            <ul>
                <li>Torrada integral</li>
                <li>Frutas cortadas</li>
                <li>Suco frutas</li>
           </ul>
        </div>
        <div class="bg-gray-900 shadow-md rounded-md p-2">
             <ul>
                <li>Feijão com arroz</li>
                <li>Frango</li>
                <li>Salada</li>
                <li>Suco de frutas</li>
           </ul>
        </div>
        <div class="bg-gray-900 shadow-md rounded-md p-2">
            <ul>
                <li>Creme de cenoura</li>
                <li>Pescada no forno</li>
                <li>Batata cozida</li>
                <li>suco de frutas</li>
           </ul>
        </div>

        <!-- Quinta -->
        <div class="bg-gray-900 shadow-md rounded-md p-2">
            <ul>
                <li>Torrada integral</li>
                <li>Frutas cortadas</li>
                <li>Suco frutas</li>
           </ul>
        </div>
        <div class="bg-gray-900 shadow-md rounded-md p-2">
             <ul>
                <li>Feijão com arroz</li>
                <li>Frango</li>
                <li>Salada</li>
                <li>Suco de frutas</li>
           </ul>
        </div>
        <div class="bg-gray-900 shadow-md rounded-md p-2">
            <ul>
                <li>Creme de cenoura</li>
                <li>Pescada no forno</li>
                <li>Batata cozida</li>
                <li>suco de frutas</li>
           </ul>
        </div>


        <!-- Sexta -->
        <div class="bg-gray-900 shadow-md rounded-md p-2">
            <ul>
                <li>Torrada integral</li>
                <li>Frutas cortadas</li>
                <li>Suco frutas</li>
           </ul>
        </div>
        <div class="bg-gray-900 shadow-md rounded-md p-2">
             <ul>
                <li>Feijão com arroz</li>
                <li>Frango</li>
                <li>Salada</li>
                <li>Suco de frutas</li>
           </ul>
        </div>
        <div class="bg-gray-900 shadow-md rounded-md p-2">
            <ul>
                <li>Creme de cenoura</li>
                <li>Pescada no forno</li>
                <li>Batata cozida</li>
                <li>suco de frutas</li>
           </ul>
        </div>

        <!-- Sábado -->
        <div class="bg-gray-900 shadow-md rounded-md p-2">
            <ul>
                <li>Torrada integral</li>
                <li>Frutas cortadas</li>
                <li>Suco frutas</li>
           </ul>
        </div>
        <div class="bg-gray-900 shadow-md rounded-md p-2">
             <ul>
                <li>Feijão com arroz</li>
                <li>Frango</li>
                <li>Salada</li>
                <li>Suco de frutas</li>
           </ul>
        </div>
        <div class="bg-gray-900 shadow-md rounded-md p-2">
            <ul>
                <li>Creme de cenoura</li>
                <li>Pescada no forno</li>
                <li>Batata cozida</li>
                <li>suco de frutas</li>
           </ul>
        </div>

        <!-- Domingo -->
        <div class="bg-gray-900 shadow-md rounded-md p-2">
            <ul>
                <li>Torrada integral</li>
                <li>Frutas cortadas</li>
                <li>Suco frutas</li>
           </ul>
        </div>
        <div class="bg-gray-900 shadow-md rounded-md p-2">
             <ul>
                <li>Feijão com arroz</li>
                <li>Frango</li>
                <li>Salada</li>
                <li>Suco de frutas</li>
           </ul>
        </div>
        <div class="bg-gray-900 shadow-md rounded-md p-2">
            <ul>
                <li>Creme de cenoura</li>
                <li>Pescada no forno</li>
                <li>Batata cozida</li>
                <li>suco de frutas</li>
           </ul>
        </div>

    </div>
</div>