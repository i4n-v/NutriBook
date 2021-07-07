<x-guest-layout>
    <div class="min-h-screen bg-white" x-data="{ food:true }">
        <x-slot name="header"> 
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
                {{ __('Visualize, crie e reutilize os alimentos implementados por nutricionistas de todo o mundo!') }}
            </h2>
        </x-slot>

        @if(!isset($_GET['edit']))
            <div class="float-right mt-5 mr-5" @click="food = false" x-show="food">
                <x-button>
                    {{ __('Adicionar') }}
                </x-button>
            </div>
        @endif

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" id="divBody">
                    @if(!isset($_GET['edit']))
                        <div class="p-6 bg-gray-100 border-b border-gray-200" x-bind:class="food?'':'bg-gray-800 w-10/12 rounded-lg m-auto'">
                            <div class="flex gap-4">
                            
                                <x-ordering-foods/>
                                <div class="w-7/12 ml-auto mr-5" x-show="food">

                                    <!-- message div -->
                                    @if(isset($_GET['success'])||isset($_GET['error']))
                                        <x-message :success="$_GET['success']??''" :error="$_GET['error']??''" x-show="load"/>
                                    @endif
                                    
                                    <div class="mb-5 font-bold">
                                        Aqui estão todos os alimentos criados:
                                    </div>
                                    
                                    <!-- food tables -->
                                    <x-table-foods/>

                                </div>

                                <!-- Foods create -->
                                <x-form-create-layout>

                                    <h2 class="text-center h2 text-white text-3xl mb-4"> Criar Alimento </h2>

                                    <x-create-food-form/>

                                </x-form-create-layout>
                            @else
                                <div class="p-6 border-gray-200 bg-gray-800 w-10/12 rounded-lg m-auto">
                                    <div class="flex gap-4" x-data="{ food=true }">
                                        <x-form-create-layout>
                                            
                                            <h2 class="text-center h2 text-white text-3xl mb-4"> Editar alimento </h2>

                                            <x-edit-food-form/>
                                        </x-form-create-layout>
                            @endif
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
