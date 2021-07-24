<div class="w-full m-auto">
	<fieldset class=" border border-gray-800 pb-3 px-0.5 rounded-md">
		<legend class="flex pr-1 font-bold">
			<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
			</svg>
			Filtrar
		</legend>
		<div class="w-full text-center">
			<label>Nome do paciente:</label>
			<x-input class="w-5/12" type="text" x-model="filterNamePatient"/>
			<label>CPF:</label>
			<x-input class="w-36" type="text" x-model="filterCPFPatient" maxlength="11" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" />
			<label>Data de vínculo:</label>
			<x-input class="w-44" type="date"/>
		</div>
	</fieldset>
</div>
