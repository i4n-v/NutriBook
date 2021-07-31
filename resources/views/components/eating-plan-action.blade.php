@php
    if(isset($eatingPlan)){
        $name = explode(' ', $eatingPlan->patient->user->name);
        $name = "$name[0] $name[1]";
        $user = $eatingPlan->patient->user;
    }else{
        $name = explode(' ', $patient->user->name);
        $name = "$name[0] $name[1]";
        $user = $patient->user;
    }
@endphp
<x-guest-layout>
    <div class="min-h-screen bg-white">
        <x-slot name="header">
            <div class="ml-2 text-gray-600 font-bold text-sm mt-2">
                <a href="{{ route('home') }}" class="transition delay-150 hover:text-gray-900">Meus pacientes</a> >
                <a href="{{ route('eating_plan', $user) }}" class="transition delay-150 hover:text-gray-900">{{ $name }}</a> >
                @if(isset($patient))
                    <span class="cursor-default">Criar plano alimentar</span>
                @else
                    <span class="cursor-default">Editar plano alimentar</span>
                @endif
            </div>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border-gray-200 bg-gray-800 w-10/12 rounded-lg m-auto">
                        <div class="flex gap-4">

                            <div class="mx-auto w-6/12">
                                @if(isset($patient))
                                    <h2 class="text-center h2 text-white text-3xl mb-4"> Criar plano alimentar </h2>
                                    <x-create-eating-plan-form :patient="$patient"/>
                                @else
                                    <h2 class="text-center h2 text-white text-3xl mb-4"> Editar plano alimentar </h2>
                                    <x-edit-eating-plan-form :eatingPlan="$eatingPlan"/>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>