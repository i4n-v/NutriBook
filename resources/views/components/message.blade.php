@props(['sucess', 'error'])

@if($sucess!='')
    <div id="message" class="mx-auto mb-5 bg-green-300 p-1 w-9/12 rounded-md flex justify-center items-center">
        <span class="font-semibold">{{ $sucess }}</span>
    </div>
@else
    <div id="message" class="mx-auto mb-5 bg-red-300 p-1 w-9/12 rounded-md flex justify-center items-center">
        <span class="font-semibold">{{ $error }}</span>
    </div>
@endif
