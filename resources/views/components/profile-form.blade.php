@props(['user'])

@php

if($user->phone != null) {
    $phone = $user->phone;
    $dd = substr($phone, 1, 2);
    $num = substr($phone, 5);
    $num = explode('-', $num);
    $phone = 55 . $dd .  $num[0] . $num[1];
}

@endphp

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
    <div>
        <x-label for="location" class="text-gray-900 font-bold" :value="__('Localização')" />

        <x-input id="location" class="block mt-1 w-full disable" type="text" name="location" :value="$user->location" :disabled="$user->id != Auth::user()->id" required autofocus />
    </div>
    <div x-data="phoneFormatter" x-init="watch">
        <x-label for="phone" class="text-gray-900 font-bold" :value="__('Telefone')" />

        <x-input id="phone" class="block mt-1 w-full disable" type="tel" name="phone" x-model="phone" :value="$user->phone ?? ''" minlength="14" maxlength="15" :disabled="$user->id != Auth::user()->id" required autofocus />
    </div>
    @if($user->id == Auth::user()->id)
        <div class="flex items-center justify-center mt-4">
            <x-button class="px-10" class="disable">
                {{ __('Salvar') }}
            </x-button>
        </div>
    @else
        <div class="flex items-center justify-center mt-4">
            <a href="https://wa.me/{{ $phone ?? '' }}" class="p-2 bg-yellow-400 transition delay-150 hover:bg-yellow-500 font-semibold rounded-md" class="disable" target="_blank">
                Entrar em contato
            </a>
        </div>
    @endif
</form>