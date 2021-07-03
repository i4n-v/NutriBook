<div x-show="click" class="grid grid-rows-2 my-1 divide-y bg-white text-gray-900 absolute left-100 top-100 w-1/6 text-center font-semibold right-7 top-12 rounded-lg shadow-2xl">

    <!-- Patient items for dropdawn -->  
    @if(Auth::user()->isPatient())
        <a href="#" class="hover:bg-yellow-400 rounded-md py-1">Perfil</a>
    @else
    <!-- Nutritionist items for dropdawn -->
        <a href="#" class="hover:bg-yellow-400 rounded-md py-1">Perfil</a>
    @endif

    <!-- Logout users -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type='submit', class="hover:bg-yellow-400 rounded-md py-1 w-full h-full focus:outline-none">Sair</button>
    </form>

</div>
