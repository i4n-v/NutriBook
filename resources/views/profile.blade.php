@php
    if(isset($user)) {
        $name = explode(' ', $user->name);
        if (isset($name[1])) {
            $name = "$name[0] $name[1]";
        } else {
            $name = $user->name;
        }
    }
@endphp

<x-guest-layout>
    <div class="min-h-screen bg-white">
        <x-slot name="header">
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
                Perfil
            </h2>
            <div class="ml-2 text-gray-600 font-bold text-sm mt-2">
                @if ($user->isPatient() && $user->id != Auth::user()->id)
                <a href="{{ route('home') }}" class="transition delay-150 hover:text-gray-900">Pacientes</a> >
                <span class="cursor-default">{{ $name }}</span>
                @else
                <a href="{{ route('home') }}" class="transition delay-150 hover:text-gray-900">Página inicial</a> >
                <span class="cursor-default">Perfil</span>
                @endif
            </div>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
                <div class="bg-gray-100 w-10/12 rounded-lg m-auto p-1">
                    <div class="bg-gray-100 border-b border-gray-200">
                        <div class="flex flex-wrap gap-4 w-full h-full" x-data="{ profile:true, password:false }">

                            <!-- aside menu -->
                            <x-aside-menu :user="$user"/>

                            <div class="ml-auto w-9/12">
                                <div class="mx-auto w-7/12 my-5">
                                    <h2 class="text-lg font-bold text-gray-900 mb-5" x-show="profile">
                                        @if (isset($user) && $user->id == Auth::user()->id)
                                            Meus dados
                                        @else
                                            @if ($user->isPatient())
                                                Dados do paciente
                                            @else
                                                Dados do nutricionista
                                            @endif
                                        @endif
                                    </h2>
                                    <h2 class="text-lg font-bold text-gray-900 mb-5" x-show="password">Redefinir senha</h2>

                                    <!-- message div -->
                                    @if(session('success') || session('error'))
                                        <x-message :success="session('success')??''" :error="session('error')??''" x-show="load" class="mx-auto"/>
                                    @endif

                                    <x-profile-form :user="$user"/>

                                    <x-profile-password-form :user="$user"/>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>