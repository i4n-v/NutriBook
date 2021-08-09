@props(['user'])

<div class="bg-white rounded-md">
    <div class="grid grid-rows-2 text-center p-1">
        <span class="w-full py-2 px-2 border-b transition delay-150 hover:bg-yellow-400 cursor-pointer rounded-md" @click="profile=true; password=false" x-bind:class="profile?'bg-yellow-400':''">
            @if ($user->id != Auth::user()->id)
                @if ($user->isPatient())
                    Dados do paciente
                @else
                    Dados do nutricionista
                @endif
            @else
                Meus dados
            @endif
        </span>

        @if($user->id == Auth::user()->id)
            <span class="w-full py-2 px-2 border-b transition delay-150 hover:bg-yellow-400 cursor-pointer rounded-md" @click="profile=false; password=true" x-bind:class="password?'bg-yellow-400':''">Redefinir senhar</span>
        @endif
    </div>
</div>