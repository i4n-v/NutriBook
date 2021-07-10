<div class="text-center">
    <span class="d-block font-bold text-gray-900 text-md">{{ $text }}</span>
    <div class="flex items-center justify-center gap-32 mt-10">
        {{ $slot }}
        <x-confirm-button class="px-8" @click="confirm=false" @click.away="confirm=false">Não</x-confirm-button>
    </div>
</div>