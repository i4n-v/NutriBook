<form method="POST" action="{{ route('update_patient_password') }}" class="mt-3 w-7/12 mx-auto" x-data="{ password:false }">

    @csrf

    <div class="text-white text-center">
        <div class="w-full bg-gray-900 font-semibold rounded-sm cursor-pointer transition delay-150 hover:bg-yellow-500 hover:text-gray-900 shadow-lg" @click="password = !password" x-bind:class="password?'bg-yellow-400 text-gray-900':''">Alterar senha</div>
    </div>

    <div x-show="password">
        <div class="my-3">
            <x-label for="current_password" class="text-gray-900 font-bold" :value="__('Senha atual')" />

            <x-input id="current_password" class="block mt-1 w-full" type="password" name="current_password" required autofocus minlength="8" />
        </div>
        <div class="mb-3">
            <x-label for="new_password" class="text-gray-900 font-bold" :value="__('Nova senha')" />

            <x-input id="new_password" class="block mt-1 w-full" type="password" name="new_password" required autofocus minlength="8" />
        </div>
        <div class="mb-3">
            <x-label for="password_confirmation" class="text-gray-900 font-bold" :value="__('Confirmar nova senha')" />

            <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autofocus minlength="8" />
        </div>
        <div class="flex items-center justify-center mt-4">
            <x-button class="px-2">
                {{ __('Confirmar') }}
            </x-button>
        </div>
    </div>
</form>