<a {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-yellow-400 border border-transparent rounded-md font-bold text-xs text-gray-900 uppercase tracking-widest hover:bg-yellow-500 active:bg-gray-900 focus:outline-none focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer']) }}>
    {{ $slot }}
</a>