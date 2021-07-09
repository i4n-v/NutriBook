<div class="bg-white rounded-md">
    <div class="grid grid-rows-4 text-center p-1">
        <span class="w-full py-2 px-2 border-b transition delay-150 hover:bg-yellow-400 cursor-pointer rounded-md" @click="ava=true; med=false; dob=false; ana=false" x-bind:class="ava?'bg-yellow-400':''">Avaliação</span>
        <span class="w-full py-2 px-2 border-b transition delay-150 hover:bg-yellow-400 cursor-pointer rounded-md" @click="ava=false; med=true; dob=false; ana=false" x-bind:class="med?'bg-yellow-400':''">Medidas corporais</span>
        <span class="w-full py-2 px-2 border-b transition delay-150 hover:bg-yellow-400 cursor-pointer rounded-md" @click="ava=false; med=false; dob=true; ana=false" x-bind:class="dob?'bg-yellow-400':''">Dobras cutâneas</span>
        <span class="w-full py-2 px-2 border-b transition delay-150 hover:bg-yellow-400 cursor-pointer rounded-md" @click="ava=false; med=false; dob=false; ana=true" x-bind:class="ana?'bg-yellow-400':''">Anamnese</span>
        <span class="w-full py-2 px-2 border-b transition delay-150 hover:bg-yellow-400 cursor-pointer rounded-md">Voltar</span>
    </div>
</div>

<div class="ml-auto w-9/12">
    <div class="mx-auto w-7/12 p-5">
        <x-evaluation-form />
        <x-body-mean-form />
        <x-skinfold-form />
        <x-anamnese-form />
    </div>
</div>