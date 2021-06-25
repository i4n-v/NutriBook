<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Olá, seja bem-vindo ao sistema de planos alimentares NutriBook!') }}
        </h2>
    </x-slot>
    <x-login-register-layout>
        <div class="grid grid-cols-2 gap-8">
            <!-- NutriBook image -->
            <x-nutribook-img/>
            <div class="flex justify-center items-center">
                <div class="w-8/12">

                    <div class="flex items-center justify-center mb-4"><x-application-logo/></div>

                    

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <x-login-form/>
                </div>
            </div>
        </div>
    </x-login-register-layout>
</x-guest-layout>
