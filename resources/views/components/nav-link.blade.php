<div class="flex items-center justify-center m-auto">
    <div class="mr-2">
        <img class="cursor-pointer" class="pl-1" src="{{ asset('img/icons/bond.svg') }}" alt="dropdown icon">
    </div>
    <div class="cursor-pointer w-full h-1/2" @click="click = !click">
        <span class="transition delay-150 border-b-2 border-white hover:border-yellow-300" x-bind:class="click?'border-yellow-300':''">
            @php            
                $name = explode(' ', Auth::user()->name, -2);
                $name = implode(' ', $name);
                echo $name;
            @endphp 
        </span>
    </div>
</div>