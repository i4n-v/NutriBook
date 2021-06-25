<div class="flex items-center justify-center">
    <div class="mr-2">
        <img class="cursor-pointer" class="pl-1" src="{{ asset('img/icons/bond.svg') }}" alt="dropdown icon">
    </div>
    <div class="cursor-pointer w-full h-1/2" @click="click = !click">
        <span class="transition delay-150 border-b-2 border-white hover:border-yellow-300" x-bind:class="click?'border-yellow-300':''">
            {{ Auth::user()->name }}
        </span>
    </div>
</div>