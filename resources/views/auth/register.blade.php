<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Cadastre-se e utilize todos os recursos que o NutriBook oferece!') }}
        </h2>
    </x-slot>
    <x-auth-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <x-button @click="nutriForm = true; patientForm = false; nutri = true; patient = false">Nutricionista</x-button>
        <x-button @click="patientForm = true; nutriForm = false; patient = true; nutri = false">Paciente</x-button>
        <x-register-form-nutricionist/>
        <x-register-form-patient/>
    </x-auth-card>
</x-guest-layout>
