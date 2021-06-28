<x-guest-layout>
    <div class="min-h-screen bg-white">
        <x-slot name="header">
            <x-search-bar>
                <x-slot name="placeholder">{{ _('Pesquisar paciente') }}</x-slot>
            </x-search-bar>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gray-100 border-b border-gray-200">
                        <div class="grid grid-cols-3 gap-4">

                            <div class="font-bold">
                                Ordenar por:
                                <div class="flex pt-2">
                                    <input class="border-solid border border-gray-900 rounded mt-0.5" type="checkbox" name="">
                                    <label class="pl-1.5">A-Z</label>
                                </div>
                                <div class="flex">
                                    <input class="border-solid border border-gray-900 rounded mt-1" type="checkbox" name="">
                                    <label class="pl-1.5 mt-0.5">Z-A</label>
                                </div>
                                <div class="flex">
                                    <input class="border-solid border border-gray-900 rounded mt-1" type="checkbox" name="">
                                    <label class="pl-1.5 mb-0.5">Vínculos mais recentes</label>
                                </div>
                                <div class="flex">
                                    <input class="border-solid border border-gray-900 rounded mt-0.5" type="checkbox" name="">
                                    <label class="pl-1.5">Vínculos mais antigos</label>
                                </div>
                            </div>

                            <div class="col-span-2">
                                <div class="pb-2 font-bold">
                                    Aqui estão todos os seus pacientes:
                                </div>
                            <x-table-patients/>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>    
</x-guest-layout>
