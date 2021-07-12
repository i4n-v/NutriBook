@php
    if(Auth::user()->isPatient()){
        $name = explode(' ', Auth::user()->name)[0];
    }else{
        $name = explode(' ', App\Models\User::find($_GET['patient'])->name)[0];
    }
   $idpatient = App\Models\User::find($_GET['patient'])->profile()->id
@endphp
<x-guest-layout>
    <div class="min-h-screen bg-white">
        <x-slot name="header">
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
                Avaliações
            </h2>
            <div class="ml-2 text-gray-600 font-bold text-sm mt-2">
                <a href="{{ route('home') }}" class="transition delay-150 hover:text-gray-900">Home</a> > 
                <a href="#" class="transition delay-150 hover:text-gray-900">{{ $name }}</a> 
            </div>
        </x-slot>
        @if(!isset($_GET['evaluation']) && Auth::user()->isNutritionist())
        <div class="float-right mt-5 mr-5" @click="evaluation = false" x-show="evaluation">
            <x-add-button href="{{ route('create_evaluation', $idpatient) }}">
                {{ __('Adicionar') }}
            </x-add-button>
        </div>
        @endif
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gray-100 border-b border-gray-200">
                        <div class="flex gap-4 w-full h-full" x-data="{ ava:true, med:false, dob:false, ana:false }">

                            <!-- ordering evaluations -->
                            <x-ordering-evaluations />

                            <div class="w-6/12 ml-auto mr-5" x-show="food">

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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>