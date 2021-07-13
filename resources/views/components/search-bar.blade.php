<div class="h-1/6 relative bg-white shadow-md mb-2 border-none rounded-lg">
    <x-input class="w-full h-full" type="text" placeholder="{{ $placeholder ?? '' }}"/>
    
    <div class="absolute top-0.5 bottom-0.5 right-0.5 cursor-pointer border p-1 rounded-lg bg-yellow-400 transition delay-150 hover:bg-yellow-500">   
        <x-search-icon/>
    </div>
</div>