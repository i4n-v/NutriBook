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
                        <div class="flex gap-4">

                            <!-- Filters -->
                            <x-filters/>

                            <!-- Patients table -->
                            <x-table-patients/>
                            
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>    
</x-guest-layout>
