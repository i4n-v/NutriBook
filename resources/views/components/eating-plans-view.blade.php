@php
    $name = explode(' ', $eatingPlan->patient->user->name);
    $name = "$name[0] $name[1]";
    $user = $eatingPlan->patient->user;
@endphp
<x-guest-layout>
    <div class="min-h-screen bg-white">
        <x-slot name="header">
            <div class="ml-2 text-gray-600 font-bold text-sm mt-2" x-show="food">
                @if(Auth::user()->isNutritionist())
                    <a href="{{ route('home') }}" class="transition delay-150 hover:text-gray-900"
                    >Meus pacientes</a> >
                    <a href="{{ route('eating_plan', $user) }}" class="transition delay-150 hover:text-gray-900">{{ $name }}</a> >
                @else
                    <a href="{{ route('home') }}" class="transition delay-150 hover:text-gray-900">Planos alimentares</a> >
                @endif
                <span class="cursor-default">Plano alimentar</span>
            </div>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gray-100 border-b border-gray-200" x-bind:class="food?'':'bg-gray-800 w-10/12 rounded-lg m-auto'">
                        <div class="flex gap-4">

                            chegou mzr

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>