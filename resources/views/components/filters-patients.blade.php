<div class="w-full m-auto">
	<div class="w-full">	
    	<button x-show="filter" x-on:click="filter = false" class="flex w-auto h-8 mb-2 -ml-0.5 bg-yellow-400 text-gray-900 font-semibold px-2 pt-1 border-transparent rounded-md cursor-pointer hover:bg-yellow-500 active:bg-gray-900 focus:outline-none focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
    		<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    		<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
    		</svg>
    		Ocultar filtros
    	</button>
    	<button x-show="!filter" x-on:click="filter = true" class="flex w-auto -ml-0.5 h-8 bg-yellow-400 text-gray-900 font-semibold px-2 pt-1 border-transparent rounded-md cursor-pointer hover:bg-yellow-500 active:bg-gray-900 focus:outline-none focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
    		<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    		<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
    		</svg>
    		Filtrar
    	</button>
    </div>
	<div class="w-full" x-show="filter">
		<label>Nome do paciente:</label>
		<x-input class="w-5/12" type="text" x-model="filterNamePatient"/>
		<label>CPF:</label>
		<x-input class="w-36" type="text" x-model="filterCPFPatient"  maxlength="11" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" />
		<label>Data de vínculo:</label>
		<x-input class="w-44" type="date"/>
	</div>
</div>
