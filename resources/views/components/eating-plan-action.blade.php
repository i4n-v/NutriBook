<x-guest-layout>
    <div class="min-h-screen bg-white">
        <x-slot name="header">
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border-gray-200 bg-gray-800 w-10/12 rounded-lg m-auto">
                        <div class="flex gap-4">

                            <x-form-create-layout>
                                @if(isset($patient))
                                    <h2 class="text-center h2 text-white text-3xl mb-4"> Criar plano alimentar </h2>
                                    <x-create-eating-plan-form :patient="$patient"/>
                                @else
                                    <h2 class="text-center h2 text-white text-3xl mb-4"> Editar plano alimentar </h2>
                                    <x-edit-eating-plan-form :eatingPlan="$eatingPlan"/>
                                @endif
                            </x-form-create-layout>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>