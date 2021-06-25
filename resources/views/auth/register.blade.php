<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Cadastre-se e utilize todos os recursos que o NutriBook oferece!') }}
        </h2>
    </x-slot>
    <x-login-register-layout>
        <div class="grid grid-cols-2 gap-8">
            <!-- NutriBook image -->
            <x-nutribook-img/>

            <div class="flex justify-center items-center">
                <div class="w-8/12 my-10">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <div class="grid grid-cols-2 divide-x border rounded text-center text-white font-bold mb-4">
                        <span x-bind:class="nutriForm?'bg-yellow-400 text-gray-900':''" class="cursor-pointer bg-gray-800 transition delay-150 hover:bg-yellow-500 hover:text-gray-900" @click="nutriForm = true; patientForm = false">Nutricionista</span>
                        <span x-bind:class="patientForm?'bg-yellow-400 text-gray-900':''" class="cursor-pointer bg-gray-800 transition delay-150 hover:bg-yellow-500 hover:text-gray-900" @click="patientForm = true; nutriForm = false">Paciente</span>
                    </div>

                    <x-register-form-nutricionist/>
                    <x-register-form-patient/>
                </div>
            </div>
        </div>    
    </x-login-register-layout>
</x-guest-layout>
