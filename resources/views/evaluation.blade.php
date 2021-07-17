@php
    if(Auth::user()->isPatient()){
        $name = explode(' ', Auth::user()->name)[0];
    }else{
        $name =explode(' ', $patient->name)[0];;
    }
@endphp
<x-guest-layout>
    <div class="min-h-screen bg-white">
        <x-slot name="header">
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
                Avaliações
            </h2>
            <div class="ml-2 text-gray-600 font-bold text-sm mt-2">
                <a href="{{ route('home') }}" class="transition delay-150 hover:text-gray-900">Home</a> >
                @if(Auth::user()->isNutritionist())
                    <a href="{{ route('profile', $patient) }}" class="transition delay-150 hover:text-gray-900">{{ $name }}</a>
                @else
                    <a href="{{ route('profile') }}" class="transition delay-150 hover:text-gray-900">{{ $name }}</a>
                @endif
            </div>
        </x-slot>
        @if(Auth::user()->isNutritionist())
        <div class="float-right mt-5 mr-5" @click="evaluation = false" x-show="evaluation">
            <x-add-button href="{{ route('create_evaluation', $patient->patientProfile->id) }}">
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
                                @if(session('success') || session('error'))
                                <x-message :success="session('success')??''" :error="session('error')??''" x-show="load" />
                                @endif

                                <div class="mb-5 font-bold">
                                    Aqui estão todas as suas avaliações:
                                </div>

                                <!-- evaluation tables -->
                                <x-table-evaluations :patient="$patient ?? Auth::user()"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>