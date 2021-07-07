<x-guest-layout>
    <div class="min-h-screen bg-white">
        <x-slot name="header">
            @if(isset($_GET['eating_plan']))
                <h2 class="text-gray-900 text-2xl font-bold">Plano Alimentar</h2>
            @else
                <x-search-bar>
                    @if(Auth::user()->isNutritionist())
                        <x-slot name="placeholder">{{ _('Pesquisar pacientes') }}</x-slot>
                    @else
                        <x-slot name="placeholder">{{ _('Pesquisar nutricionistas') }}</x-slot>
                    @endif
                </x-search-bar>
            @endif
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
                                <x-eating-plans-view/>
                            @else    
                                @if (Auth::user()->isNutritionist())
                                <x-ordering-patients/>
                                @elseif (Auth::user()->isPatient())
                                <x-ordering-eating-plans/>
                                @endif
                                
                                <div class="w-7/12 ml-auto mr-5">
                                    <div class="pb-2 font-bold">
                                    @if (Auth::user()->isNutritionist())
                                        Aqui estão todos os seus pacientes:
                                    @elseif (Auth::user()->isPatient())
                                        Aqui estão todos os seus planos alimentares:
                                    @endif
                                    </div>
                                    @if (Auth::user()->isNutritionist())
                                    <x-table-my-patients/>
                                    @elseif (Auth::user()->isPatient())
                                    <x-table-my-eating-plans/>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>    
</x-guest-layout>
