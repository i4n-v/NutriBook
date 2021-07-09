<x-guest-layout>
    <div class="min-h-screen bg-white">
        <x-slot name="header">
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
                <span class="ml-2 text-gray-600 font-bold text-sm">Home > Perfil do paciente > Avaliações</span>
            </h2>
        </x-slot>
        @if(!isset($_GET['evaluation']))
        <div class="float-right mt-5 mr-5" @click="evaluation = false" x-show="evaluation">
            <x-confirm-button href="{{ route('create_evaluation') }}">
                {{ __('Adicionar') }}
            </x-confirm-button>
        </div>
        @endif
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    @if(!isset($_GET['evaluation']))
                    <div class="p-6 bg-gray-100 border-b border-gray-200">
                        <div class="flex gap-4 w-full h-full" x-data="{ ava:true, med:false, dob:false, ana:false }">

                            <!-- ordering evaluations -->
                            <x-ordering-evaluations />

                            <div class="w-8/12 ml-auto mr-5" x-show="food">

                                <!-- message div -->
                                @if(isset($_GET['success'])||isset($_GET['error']))
                                <x-message :success="$_GET['success']??''" :error="$_GET['error']??''" x-show="load" />
                                @endif

                                <div class="mb-5 font-bold">
                                    Aqui estão todas as suas avaliações:
                                </div>

                                <!-- evaluation tables -->
                                <x-table-evaluations/>
                            </div>  
                            @else
                            <div class="bg-gray-800 w-10/12 rounded-lg m-auto p-1">
                                <div class="flex flex-wrap gap-4 w-full h-full" x-data="{ ava:true, med:false, dob:false, ana:false }">

                                    <x-create-evaluation />
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>