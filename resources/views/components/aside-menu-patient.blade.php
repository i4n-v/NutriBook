@props(['patient', 'desc'])

<div class="bg-white rounded-md">
    <div class="grid grid-rows-4 text-center p-1">
        <span class="w-full py-2 px-2 border-b transition delay-150 hover:bg-yellow-400 cursor-pointer rounded-md" @click="profile=true; password=false; evaluation=false; plans=false" x-bind:class="profile?'bg-yellow-400':''">{{$desc}}</span>
        <span class="w-full py-2 px-2 border-b transition delay-150 hover:bg-yellow-400 cursor-pointer rounded-md" @click="profile=false; password=true; evaluation=false; plans=false" x-bind:class="password?'bg-yellow-400':''">Redefinir senhar</span>

        @if(Auth::user()->isNutritionist())
            <a href="/evaluation?patient={{ $patient->id }}" class="w-full py-2 px-2 border-b transition delay-150 hover:bg-yellow-400 cursor-pointer rounded-md" @click="profile=false; password=false; evaluation=true; plans=false" x-bind:class="evaluation?'bg-yellow-400':''">Avaliações</a>
            <a  href="/home?patient={{  $patient->id }}" class="w-full py-2 px-2 border-b transition delay-150 hover:bg-yellow-400 cursor-pointer rounded-md" @click="profile=false; password=false; evaluation=false; plans=true" x-bind:class="plans?'bg-yellow-400':''">Planos alimentares</a>              
        @else
            <a href="{{ route('evaluation') }}" class="w-full py-2 px-2 border-b transition delay-150 hover:bg-yellow-400 cursor-pointer rounded-md" @click="profile=false; password=false; evaluation=true; plans=false" x-bind:class="evaluation?'bg-yellow-400':''">Avaliações</a>
            <a  href="{{ route('home') }}" class="w-full py-2 px-2 border-b transition delay-150 hover:bg-yellow-400 cursor-pointer rounded-md" @click="profile=false; password=false; evaluation=false; plans=true" x-bind:class="plans?'bg-yellow-400':''">Planos alimentares</a>
        @endif

    </div>
</div>