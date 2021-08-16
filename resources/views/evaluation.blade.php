@php
    if(Auth::user()->isPatient()){
        $name = explode(' ', Auth::user()->name);
        $name = "$name[0] $name[1]";
    }else{
        $name = explode(' ', $patient->name);
        $name = "$name[0] $name[1]";
    }

@endphp

<x-guest-layout>
    <div class="min-h-screen bg-white">
        <x-slot name="header">
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight ml-0.5">
                Avaliações
            </h2>
            <div class="ml-2 text-gray-600 font-bold text-sm mt-2">
                @if(Auth::user()->isNutritionist())
                    <a href="{{ route('home') }}" class="transition delay-150 hover:text-gray-900">Pacientes</a> >
                    <span class="cursor-default">{{ $name }}</span>
                @else
                <a href="{{ route('home') }}" class="transition delay-150 hover:text-gray-900">Página inicial</a> >
                <span class="cursor-default">Avaliações</span>
                @endif
            </div>
        </x-slot>
        @if(Auth::user()->isNutritionist())
        <div class="float-right mt-5 mr-16 pr-1">
            <x-add-button x-bind:href="'/evaluation/create/' + {{ $patient->patientProfile->id }}">
                {{ __('Adicionar') }}
            </x-add-button>
        </div>
        @endif
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gray-100 border-b border-gray-200">
                        <div class="w-full" x-show="food">

                            <!-- message div -->
                            @if(session('success') || session('error'))
                            <x-message :success="session('success')??''" :error="session('error')??''" x-show="load" />
                            @endif

                            <div class="mb-5 font-bold">
                                @if (Auth::user()->isNutritionist())
                                Aqui estão todas as avaliações de {{ $name }}:
                                @else
                                Aqui estão todas as suas avaliações:
                                @endif
                            </div>

                            <!-- evaluation tables -->
                            <x-table-evaluations :patient="$patient ?? Auth::user()"/>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>