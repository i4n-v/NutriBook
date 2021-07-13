@php
    if(Auth::user()->isPatient()){
        $patient = Auth::user();
    }else{
        $patient = App\Models\User::find($_GET['patient']);
    }
@endphp
<x-guest-layout>
    <div class="min-h-screen bg-white">
        <x-slot name="header">
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
                Perfil
            </h2>
            <div class="ml-2 text-gray-600 font-bold text-sm mt-2">
                <a href="{{ route('home') }}" class="transition delay-150 hover:text-gray-900">Home</a>
            </div>
        </x-slot>
        <div class="flex gap-4 float-right text-gray-900 font-semibold mr-8">
            @if(Auth::user()->isNutritionist())
                <a href="/evaluation?patient={{ $patient->id }}" class="bg-yellow-400 rounded-md px-2 py-1 transition delay-150 hover:bg-yellow-500 shadow-md">Avaliações</a>
                <a href="/home?patient={{  $patient->id }}" class="bg-yellow-400 rounded-md px-2 py-1 transition delay-150 hover:bg-yellow-500 shadow-md">Planos alimentares</a>
            @else
                <a href="{{ route('evaluation') }}" class="bg-yellow-400 rounded-md px-2 py-1 transition delay-150 hover:bg-yellow-500 shadow-md">Avaliações</a>
                <a href="{{ route('home') }}" class="bg-yellow-400 rounded-md px-2 py-1 transition delay-150 hover:bg-yellow-500 shadow-md">Planos alimentares</a>
            @endif
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
                <div class="bg-white w-7/12 mx-auto overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gray-100 border-b border-gray-200">
                        <div class="w-full h-full">
                            <div x-data="{ edit:false }">

                                @if(Auth::user()->isPatient())
                                    <div class="flex gap-4 float-right text-white font-semibold">
                                        <a class="bg-gray-900 rounded-md p-2 transition delay-150 hover:text-gray-900 shadow-md cursor-pointer" @click="edit = !edit" x-bind:class="edit?'bg-red-400 text-gray-900 hover:bg-red-500':'hover:bg-yellow-500'" x-text="edit?'Cancelar':'Editar'" onclick="desabilitar()"></a>
                                    </div>
                                @endif
                                
                                <h2 class="text-lg font-bold text-gray-900 mb-5">Meus dados</h2>
                                
                                <!-- message div -->
                                @if(isset($_GET['success'])||isset($_GET['error']))
                                <x-message :success="$_GET['success']??''" :error="$_GET['error']??''" x-show="load" />
                                @endif
                                
                                @if(Auth::user()->isPatient() || isset($_GET['patient']))
                                    <x-patient-profile :patient="$patient" />
                                    @if(Auth::user()->isPatient())
                                        <x-patient-password-form/>
                                    @endif
                                @else

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>