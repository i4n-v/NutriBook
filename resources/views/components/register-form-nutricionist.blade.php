<form method="POST" action="{{ route('register') }}" x-show="nutriForm">
            @csrf

            <legend class="mb-4"><span class="text-white border-b-2 border-white cursor-pointer transition delay-150 hover:border-yellow-300">Cadastre-se como nutricionista</span></legend>

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nome')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus placeholder="Digite seu nome"/>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('E-mail')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required placeholder="Digite seu e-mail"/>
            </div>

            <!-- CPF -->
            <div class="mt-4">
                <x-label for="cpf" :value="__('CPF')" />

                <x-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')" required minlength="11" maxlength="11" placeholder="Digite seu CPF"/>
            </div>

            <!-- CRN -->
            <div class="mt-4">
                <x-label for="crn" :value="__('CRN')" />

                <x-input id="crn" class="block mt-1 w-full" type="text" name="crn" :value="old('crn')" required minlength="4" maxlength="4" placeholder="Digite seu número de registro"/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Senha')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" 
                                placeholder="Digite sua senha"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmar senha')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required 
                                placeholder="Confirme sua senha"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-white hover:text-yellow-200" href="{{ route('login') }}">
                    {{ __('Já está cadastrado?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Registrar-se') }}
                </x-button>
            </div>
        </form>