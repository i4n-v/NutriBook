<nav class="bg-gray-900 text-white min-w-screen border-b relative shadow-md" x-data="{ click:false }"> 
    <div class="flex justify-between w-full h-16 mx-auto px-4 sm:px-6 lg:px-8 static">
        <div div class="w-full flex items-start grid grid-cols-12 mx-4 mt-1.5">

            <div class="col-start-1 col-span-2 flex">
                <div class="flex items-center pt-0.75">
                    <a href="{{ route('login') }}">
                        <x-application-logo class="block h-10 w-auto fill-current shadow-2xl" />
                    </a>
                </div>
                @auth
                    @if (Auth::user()->isNutritionist())
                    <div class="pt-5 pl-4">
                        <a class="border-b-2 border-white transition delay-150 hover:border-yellow-300" href="{{ route('foods') }}">Alimentos</a>
                    </div>
                    @endif
                @endauth
            </div>
            
            @if (!Auth::user()!=null)
            
            <div class="col-start-11 col-end-11 pt-5 text-center">
                <a class="border-b-2 border-white transition delay-150 hover:border-yellow-300" href="{{ route('login') }}">Entrar</a> 
            </div>
            
            <div class="col-start-12 col-end-12 pt-5 text-center">
                <a class="border-b-2 border-white transition delay-150 hover:border-yellow-300" href="{{ route('register') }}">Cadastrar-se</a>
            </div>
            
            @else

            <div class="col-start-3 col-span-8 pt-1 flex justify-end">
                    <x-search-bar>
                        @if (Auth::user()->isNutritionist())
                        <x-slot name="placeholder">{{ _('Pesquisar pacientes') }}</x-slot>
                        @else
                        <x-slot name="placeholder">{{ _('Pesquisar nutricionistas') }}</x-slot>
                        @endif
                    </x-search-bar>
            </div>

            <div class="col-start-11 col-span-2 pt-3.5 ml-16 text-right">
                <x-nav-link/>
                <x-dropdown/>
            </div>

            @endif
        
        </div>
    </div>
</nav>