<x-guest-layout>
    <div class="min-h-screen bg-white" x-data="foods">
        <x-slot name="header">
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight ml-0.5" x-show="open">
                Alimentos
            </h2>
            <div class="ml-2 text-gray-600 font-bold text-sm mt-2" x-show="open">
                <a href="{{ route('home') }}" class="transition delay-150 hover:text-gray-900">Página inicial</a> >
                <span class="cursor-default">Alimentos</span>
            </div>
            <div class="ml-2 text-gray-600 font-bold text-sm mt-2" x-show="!open">
                <a href="{{ route('home') }}" class="transition delay-150 hover:text-gray-900"
                >Página inicial</a> >
                <a href="{{ route('foods') }}" class="transition delay-150 hover:text-gray-900"
                >Alimentos</a> >
                <span class="cursor-default">Adicionar alimento</span>
            </div>
        </x-slot>
        <div class="float-right mt-5 mr-16 pr-1" @click="open = false" x-show="open">
            <x-button>
                {{ __('Adicionar') }}
            </x-button>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gray-100 border-b border-gray-200" x-bind:class="open?'':'bg-gray-800 w-10/12 rounded-lg m-auto'">
                        <div class="w-full">

                            <!-- message div -->
                            @if(session('success') || session('error'))
                                <x-message :success="session('success')??''" :error="session('error')??''" x-show="load" class="mx-auto"/>
                            @endif

                            <div class="w-full" x-show="open">
                                <div class="mb-5 font-bold">
                                    Aqui estão todos os alimentos criados:
                                </div>
                                <!-- food tables -->
                                <x-table-foods />
                            </div>

                            <!-- Foods create -->
                            <x-form-create-layout>
                                <h2 class="text-center h2 text-white text-3xl mb-4"> Criar Alimento </h2>
                                <x-create-food-form />
                            </x-form-create-layout>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>