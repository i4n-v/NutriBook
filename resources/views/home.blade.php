<x-guest-layout>
    <div class="min-h-screen bg-white">
        <x-slot name="header">
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gray-100 border-b border-gray-200">
                        <div class="flex gap-4">
                            @if (Auth::user()->isNutritionist())
                            <x-ordering-patients />
                            @elseif (Auth::user()->isPatient())
                            <x-ordering-eating-plans />
                            @endif

                            <div class="w-7/12 ml-auto mr-5">

                                <!-- message div -->

                                <div class="pb-2 font-bold">
                                    @if (Auth::user()->isNutritionist())
                                    Aqui estão todos os seus pacientes:
                                    @elseif (Auth::user()->isPatient())
                                    Aqui estão todos os seus planos alimentares:
                                    @endif
                                </div>

                                @if (Auth::user()->isNutritionist())
                                <x-table-my-patients :column="$column ?? ''" :value="$value ?? ''"/>
                                @elseif (Auth::user()->isPatient())
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