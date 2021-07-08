<div class="bg-black bg-opacity-70 absolute w-full h-full left-0 top-0 flex items-center justify-center">
    <div class="mx-auto bg-white h-6/12 shadow-lg border-solid border-b-2 rounded-lg relative p-5" x-bind:class="confirm?'w-4/12':'w-5/12'">

        <span class="absolute top-1 right-4 text-gray-900 text-xl font-bold cursor-pointer transition delay-150 hover:text-red-400" @click="modal=false; confirm=false" x-show="!confirm">x</span>

        {{ $slot }}

    </div>
</div>