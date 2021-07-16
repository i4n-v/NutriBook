@props(['user'])

<form method="POST" action="{{route('update_profile', $user)}}" class="text-gray-900 grid grid-rows-3 gap-3"  x-show="profile">

    @csrf

    <div>
        <x-label for="name" class="text-gray-900 font-bold" :value="__('Nome')" />

        <x-input id="name" class="block mt-1 w-full disable" type="text" name="name" :value="$user->name" :disabled="$user->id != Auth::user()->id" required autofocus />
    </div>
    <div>
        <x-label for="cpf" class="text-gray-900 font-bold" :value="__('CPF')" />

        <x-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="$user->CPF" :disabled="true" required autofocus />
    </div>
    <div>
        <x-label for="email" class="text-gray-900 font-bold" :value="__('E-mail')" />

        <x-input id="email" class="block mt-1 w-full disable" type="email" name="email" :value="$user->email" :disabled="true" required autofocus />
    </div>
    <div>
        @if($user->isPatient())
            <x-label for="birth_date" class="text-gray-900 font-bold" :value="__('Data de nascimento')" />

            <x-input id="birth_date" class="block mt-1 w-full disable" type="date" name="birth_date" :value="explode(' ',$user->patientProfile->birth_date)[0]" :disabled="$user->id != Auth::user()->id" required autofocus />
        @else
            <x-label for="crn" class="text-gray-900 font-bold" :value="__('CRN')" />

            <x-input id="crn" class="block mt-1 w-full disable" type="text" name="crn" :value="$user->nutritionistProfile->CRN" :disabled="true" required autofocus />
        @endif
    </div>
    @if($user->id == Auth::user()->id)
        <div class="flex items-center justify-center mt-4">
            <x-button class="px-10" class="disable">
                {{ __('Salvar') }}
            </x-button>
        </div>
    @endif
</form>