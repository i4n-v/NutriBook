<form method="POST" action="{{ route('update_patient_password') }}" class="mt-3 w-10/12" x-show="password">

    @csrf

    <div x-show="password">
        <div class="my-3">
            <x-label for="current_password" class="text-gray-900 font-bold" :value="__('Senha atual')"/>

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