<x-guest-layout>
    <div class="min-h-screen bg-white">
        <x-slot name="header">
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gray-100 border-b border-gray-200">
                        <div class="w-full">
                            <div class="mb-5 font-bold">
                                Aqui estão os resultados de sua busca:
                            </div>
                            <x-table-search-results/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>