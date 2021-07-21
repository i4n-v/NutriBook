<x-guest-layout>
    <div class="min-h-screen bg-white" x-data="{ food:true }">
        <x-slot name="header">
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border-gray-200 bg-gray-800 w-10/12 rounded-lg m-auto">
                        <div class="flex gap-4" x-data="{ food=false }">

                            <x-form-create-layout>
                                <h2 class="text-center h2 text-white text-3xl mb-4"> Editar alimento </h2>

                                <x-edit-food-form :food="$food"/>
                            </x-form-create-layout>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>