<x-guest-layout>
    <div class="min-h-screen bg-white">
        <x-slot name="header">
            <x-back-button/> 
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Visualize, crie e reutilize os alimentos implementados por nutricionistas de todo o mundo!') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" x-data="{ food: true }">
                    <div class="p-6 bg-gray-100 border-b border-gray-200 relative" x-bind:class="food?'':'bg-gray-800 w-10/12 rounded-lg m-auto'">
                        <div class="flex gap-4">
                        
                            <!-- Visualization foods -->
                            <x-add-icon/>
                            
                            <x-ordering-foods/>

                            <div class="col-span-2 ml-auto w-8/12" x-show="food">
                                @if(isset($_GET['sucess'])||isset($_GET['error']))
                                    <x-message :sucess="$_GET['sucess']??''" :error="$_GET['error']??''"/>
                                @endif
                                <div class="pb-2 font-bold">
                                    Aqui estão todos os alimentos criados:
                                </div>
                                <x-table-foods/>
                            </div>

                            <!-- Foods create -->
                            <x-form-create-layout>


                                <h2 class="text-center h2 text-white text-3xl mb-4"> Criar Alimento </h2>

                                <x-create-food-form/>

                            </x-form-create-layout>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>    
</x-guest-layout>
