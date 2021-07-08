<div>
    <span class="d-block font-bold text-gray-900 text-md">Você realmente deseja excluir o alimento?</span>
    <div class="flex items-end justify-end gap-5 mt-10">
        {{ $slot }}
        <x-cancel-button @click="confirm=false">Não</x-cancel-button>
    </div>
</div>