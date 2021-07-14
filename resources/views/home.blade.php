@php
    if(isset($_GET['patient'])){
        $name = explode(' ', App\Models\User::find($_GET['patient'])->name)[0];
        $idpatient = App\Models\User::find($_GET['patient'])->id;
    }
@endphp
<x-guest-layout>
    <div class="min-h-screen bg-white">
        <x-slot name="header">
            @if(isset($_GET['eating_plan']))
            <h2 class="text-gray-900 text-2xl font-bold">Plano Alimentar</h2>
            @endif
            <div class="ml-2 text-gray-600 font-bold text-sm mt-2">
                @if(Auth::user()->isNutritionist() && isset($_GET['patient']))
                    <a href="{{ route('home') }}" class="transition delay-150 hover:text-gray-900">Home</a> > 
                    <a href="/profile?patient={{ $idpatient }}" class="transition delay-150 hover:text-gray-900">{{ $name }}</a>
                @endif
            </div>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gray-100 border-b border-gray-200">
                        @if(isset($_GET['eating_plan']))
                        <div class="grid grid-cols-3 justify-items-center text-gray-900 font-bold text-md mb-5">
                            <div>Café da manhã</div>
                            <div>Almoço</div>
                            <div>Jantar</div>
                        </div>
                        @endif
                        <div class="flex gap-4">

                            @if(isset($_GET['eating_plan']))
                            <x-eating-plans-view />
                            @endif

                            @if (Auth::user()->isNutritionist() && !isset($_GET['patient']))
                            <x-ordering-patients />
                            @elseif (Auth::user()->isPatient() || isset($_GET['patient']))
                            <x-ordering-eating-plans />
                            @endif

                            <div class="w-7/12 ml-auto mr-5">

                                <!-- message div -->
                                @if(isset($_GET['success'])||isset($_GET['error']))
                                <x-message :success="$_GET['success']??''" :error="$_GET['error']??''" x-show="load" />
                                @endif

                                <div class="pb-2 font-bold">
                                    @if (Auth::user()->isNutritionist() && !isset($_GET['patient']))
                                    Aqui estão todos os seus pacientes:
                                    @elseif (Auth::user()->isPatient() || isset($_GET['patient']))
                                    Aqui estão todos os seus planos alimentares:
                                    @endif
                                </div>
                                
                                @if (Auth::user()->isNutritionist() && !isset($_GET['patient']))
                                <x-table-my-patients :column="$column ?? ''" :value="$value ?? ''"/>
                                @elseif (Auth::user()->isPatient() || isset($_GET['patient']))
                                <x-table-my-eating-plans :column="$column ?? ''" :value="$value ?? ''"/>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>