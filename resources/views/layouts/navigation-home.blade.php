<nav class="bg-gray-900 text-white min-w-screen border-b relative shadow-md" x-data="{ click:false }"> 
    <div class="flex justify-between w-full h-16 mx-auto px-4 sm:px-6 lg:px-8 static">
        <div div class="flex-initial flex w-1/2 items-center">
            <div class="ml-4 mt-1.5">
                <a href="{{ route('login') }}">
                    <x-application-logo class="block h-10 w-auto fill-current shadow-2xl" />
                </a>
            </div>
            
            @if (Auth::user()!=null)
            <div class="w-10 mt-2 ml-2 focus-within:w-6/12 duration-300">
                    <x-search-bar>
                        @if (Auth::user()->isNutritionist())
                        <x-slot name="placeholder">{{ _('Pesquisar pacientes') }}</x-slot>
                        @else
                        <x-slot name="placeholder">{{ _('Pesquisar nutricionistas') }}</x-slot>
                        @endif
                    </x-search-bar>
            </div>
            @endif

            <div  class="ml-4 flex gap-3">
                @if (Auth::user()!=null)
                    @if (Auth::user()->isNutritionist())
                        <a class="border-b-2 border-white transition delay-150 hover:border-yellow-300" href="{{ route('foods') }}">Alimentos</a>
                    @endif
                @endif
            </div>
        </div>

        <div class="flex-initial flex items-center gap-3 ml-auto">
           
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