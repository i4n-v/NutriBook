@php
    if(isset($patient)){
        $name = explode(' ', $patient->user->name);
        $name = "$name[0] $name[1]";
    }
@endphp
<x-guest-layout>
    <div class="min-h-screen bg-white">
        <x-slot name="header">
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
                @if(isset($patient))
                    Planos Alimentares
                @endif
            </h2>
            @if(isset($patient))
                <div class="ml-2 text-gray-600 font-bold text-sm mt-2">
                    <a href="{{ route('home') }}" class="transition delay-150 hover:text-gray-900">Pacientes</a> >
                    <span class="cursor-default">{{ $name }}</span>
                </div>
            @endif
        </x-slot>
        @if(Auth::user()->isNutritionist() && isset($patient))
            <div class="float-right mt-5 mr-5">
                <x-add-button href="{{ route('action_eatingplan_create', $patient) }}">
                    {{ __('Adicionar') }}
                </x-add-button>
            </div>
        @endif
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gray-100 border-b border-gray-200">
                        <div class="w-full">
                            <!-- message div -->
                            @if(session('success') || session('error'))
                                <x-message :success="session('success')??''" :error="session('error')??''" x-show="load" />
                            @endif
                            <div class="mb-5 font-bold">
                                @if (Auth::user()->isNutritionist() && !isset($patient))
                                    Aqui estão todos os seus pacientes:
                                @elseif (Auth::user()->isPatient() || isset($patient))
                                    Aqui estão todos os seus planos alimentares:
                                @endif
                            </div>
                            @if (Auth::user()->isNutritionist() && !isset($patient))
                            <x-table-my-patients/>
                            @elseif (Auth::user()->isPatient() || isset($patient))
                            <x-table-my-eating-plans :id="$patient->user->id ?? Auth::user()->id"/>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>