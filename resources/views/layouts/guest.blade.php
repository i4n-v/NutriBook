<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('img/icons/icon.svg') }}" type="image/x-icon">

        <title>{{ config('app.name', 'NutriBook') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="relative">
        <div class="bg-white">
            @if (isset($header))
                @include('layouts.navigation-home')

                <!-- Page Heading -->
                <header class="w-full pl-16 mt-7 -mb-10">
                       {{ $header }}
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        @if (isset($header))
            @include('layouts.footer')
        @endif
    </body>
</html>
<script>
    function confirmDelete(url){

        let divMother = document.createElement("div");
        let divChild = document.createElement("div");
        
        divMother.setAttribute("class", "w-full h-full absolute top-0 flex justify-center items-center");
        divMother.setAttribute("id", "divMother");
        divChild.setAttribute("class", "bg-white w-4/12 p-5 text-gray-900 shadow-lg rounded-lg");
        divChild.innerHTML = `<h2 class='mb-8 text-center font-bold'>Você realmente deseja excluir o alimento?</h2>                   <a class='inline-flex items-center px-4 py-2 bg-red-400 border border-transparent rounded-md font-bold text-xs text-gray-900 uppercase tracking-widest hover:bg-red-500 active:bg-gray-900 focus:outline-none focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer' onclick='cancelDelete()'>Cancelar</a>                                                                                                     <a class='inline-flex items-center px-4 py-2 bg-yellow-400 border border-transparent rounded-md font-bold text-xs text-gray-900 uppercase tracking-widest hover:bg-yellow-500 active:bg-gray-900 focus:outline-none focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer float-right' href=${url}>Confirmar</>`;
        divMother.appendChild(divChild);
        
        let divBody = document.getElementById('divBody');
        divBody.setAttribute("class", "relative");
        divBody.appendChild(divMother);

    }

    function cancelDelete(){

        document.getElementById('divMother').remove();

    }

</script>
