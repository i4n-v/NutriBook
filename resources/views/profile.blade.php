@php
    // if(Auth::user()->isPatient()){
    //     $patient = Auth::user();
    // }else{
    //     $patient = App\Models\User::find($_GET['patient']);
    // }
    // if(isset($_GET['patient'])){
    //     $desc = 'Dados do paciente';
    // }else{
    //     $desc = 'Meus dados';
    // }
    $desc = 'Dados do paciente';
    if ($patient->id == Auth::user()->id) {
        $desc = 'Meus dados';
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
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
                <div class="bg-gray-100 w-10/12 rounded-lg m-auto p-1">
                    <div class="bg-gray-100 border-b border-gray-200">
                        <div class="flex flex-wrap gap-4 w-full h-full" x-data="{ profile:true, password:false, evaluation:false, plans:false }">
                            
                            <!-- aside menu -->
                            <x-aside-menu-patient :patient="$patient" :desc="$desc"/>

                            <div class="ml-auto w-9/12">
                                <div class="mx-auto w-7/12 my-5">
                                    <h2 class="text-lg font-bold text-gray-900 mb-5" x-show="profile">{{$desc}}</h2>
                                    <h2 class="text-lg font-bold text-gray-900 mb-5" x-show="password">Redefinir senha</h2>

                                    <!-- message div -->
                                    @if(session('success') || session('error'))
                                        <x-message :success="session('success')??''" :error="session('error')??''" x-show="load" />
                                    @endif

                                    <x-patient-profile :patient="$patient"/>
                                    @if(Auth::user()->isPatient())
                                        <x-patient-password-form/>
                                    @else

                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>