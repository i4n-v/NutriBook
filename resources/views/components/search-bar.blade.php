<div class="h-1/6 relative shadow-md mb-2 border-none">
    <input class="text-white bg-transparent rounded-full w-full border-2 border-yellow-500 py-2 leading-tight focus:outline-none shadow-sm focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 placeholder-white" type="text" placeholder="{{ $placeholder ?? '' }}"/>
    <div class="absolute top-0.5 bottom-0.5 right-0.75 cursor-pointer border p-1 rounded-full bg-white transition delay-150">   
        <button class="border-none focus:outline-none">
            <x-search-icon/>
        </button>
    </div>
</div>
