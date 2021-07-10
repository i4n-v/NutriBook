@php
    $name = explode(' ', App\Models\Evaluation::find($_GET['evaluation'])->patient->user->name)[0];
    $id = App\Models\Evaluation::find($_GET['evaluation'])->patient->user->id
@endphp
<x-guest-layout>
    <div class="min-h-screen bg-white">
        <x-slot name="header">
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
                Avaliação
            </h2>
            <div class="ml-2 text-gray-600 font-bold text-sm mt-2">
                <a href="{{ route('home') }}" class="transition delay-150 hover:text-gray-900">Home</a> > 
                <a href="#" class="transition delay-150 hover:text-gray-900">{{ $name }}</a> >
                <a href="/evaluation?patient={{ $id }}" class="transition delay-150 hover:text-gray-900">Avaliações</a>
            </div>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-1 w-9/12 m-auto bg-gray-100 border-b border-gray-200 rounded-md">
                        <div class="flex gap-4 w-full h-full" x-data="{ ava:true, med:false, dob:false, ana:false }">
                            <div class="bg-white rounded-md">
                                <div class="grid grid-rows-4 text-center p-1">
                                    <span class="w-full py-2 px-2 border-b transition delay-150 hover:bg-yellow-400 cursor-pointer rounded-md" @click="ava=true; med=false; dob=false; ana=false" x-bind:class="ava?'bg-yellow-400':''">Avaliação</span>
                                    <span class="w-full py-2 px-2 border-b transition delay-150 hover:bg-yellow-400 cursor-pointer rounded-md" @click="ava=false; med=true; dob=false; ana=false" x-bind:class="med?'bg-yellow-400':''">Medidas corporais</span>
                                    <span class="w-full py-2 px-2 border-b transition delay-150 hover:bg-yellow-400 cursor-pointer rounded-md" @click="ava=false; med=false; dob=true; ana=false" x-bind:class="dob?'bg-yellow-400':''">Dobras cutâneas</span>
                                    <span class="w-full py-2 px-2 border-b transition delay-150 hover:bg-yellow-400 cursor-pointer rounded-md" @click="ava=false; med=false; dob=false; ana=true" x-bind:class="ana?'bg-yellow-400':''">Anamnese</span>
                                </div>
                            </div>
                            <div class="ml-auto w-9/12">
                                <div class="mx-auto w-9/12 p-5">
                                @php
                                    $evaluation = App\Models\Evaluation::find($_GET['evaluation']);
                                    $body_measurement = $evaluation->bodyMeasurement;
                                    $skin_fold = $evaluation->skinFold;
                                    $anamnese = $evaluation->anamnese;
                                @endphp
                                    <x-evaluation-view-table :evaluation="$evaluation"/>
                                    <x-body-measurement-view-table :bodyMeasurement="$body_measurement"/>
                                    <x-skinfold-view-table :skinFold="$skin_fold"/>
                                    <x-anamnese-view-table :anamnese="$anamnese"/>
                                </div>   
                            </div>                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>