<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <x-button @click="nutriForm = true; patientForm = false; nutri = true; patient = false">Nutricionista</x-button>
        <x-button @click="patientForm = true; nutriForm = false; patient = true; nutri = false">Paciente</x-button>
        <x-register-form-nutricionist/>
        <x-register-form-patient/>
    </x-auth-card>
</x-guest-layout>
