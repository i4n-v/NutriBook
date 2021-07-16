<div x-show="click" class="grid grid-rows-2 my-1 divide-y bg-white text-gray-900 absolute left-100 top-100 w-1/6 text-center font-semibold right-7 top-12 rounded-lg shadow-2xl">

    <a href="{{ route('profile', Auth::user()) }}" class="hover:bg-yellow-400 rounded-md py-1">Perfil</a>

    <!-- Logout users -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type='submit', class="hover:bg-yellow-400 rounded-md py-1 w-full h-full focus:outline-none">Sair</button>
    </form>

</div>
