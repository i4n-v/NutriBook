<nav class="bg-gray-900 text-white min-w-screen border-b relative" x-data="{ click:false }"> 
    <div class="flex justify-between w-full h-16 mx-auto px-4 sm:px-6 lg:px-8 static">
        <div div class="flex-initial flex w-1/2 items-center">
            <div>
                <a href="{{ route('login') }}">
                    <x-application-logo class="block h-10 w-auto fill-current shadow-2xl" />
                </a>
            </div>
             <div class="ml-4 border-b-2 border-white transition delay-150 hover:border-yellow-300 cursor-pointer">
                <span>Seja bem-vindo!</span>
            </div>
        </div>

        <div class="flex-initial w-1/6 flex items-center float-right gap-8">
            @if (!Auth::user()!=null)
                <a class="border-b-2 border-gray-900 transition delay-150 hover:border-yellow-300" href="{{ route('login') }}">Entrar</a> 
                <a class="border-b-2 border-gray-900 transition delay-150 hover:border-yellow-300" href="{{ route('register') }}">Cadastrar-se</a>
            @else
                <x-nav-link/>
                <x-dropdown/>
            @endif
        </div>
    </div>
</nav>