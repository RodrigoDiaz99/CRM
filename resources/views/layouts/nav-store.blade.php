<div class="container mx-auto px-6 py-3">
    <div class="flex items-center justify-between">
        <div class="hidden w-full text-gray-600 md:flex md:items-center">
            LOGO
        </div>
        <div class="w-full text-gray-700 md:text-center text-2xl font-semibold">
            CRM
        </div>
        <div class="flex items-center justify-end w-full">
            <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none mx-4 sm:mx-0">
                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
            </button>


        </div>
    </div>
    <nav class="sm:flex sm:justify-center sm:items-center mt-4">
        <div class="flex flex-col sm:flex-row">
            <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="{{route('welcome')}}">Inicio</a>
            <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="{{route('shop')}}">Tienda</a>
            <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Categorias</a>
            <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="{{route('contact')}}">Contacto</a>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('dashboard') }}" class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0">Panel</a>
                @else
                    <a href="{{ route('login') }}" class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0">Iniciar Sesión</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0">Registrate</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>
    <div class="relative mt-6 max-w-lg mx-auto">
        <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
            <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                <path
                    d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </span>

        <input
            class="w-full border rounded-md pl-10 pr-4 py-2 focus:border-blue-500 focus:outline-none focus:shadow-outline"
            type="text" placeholder="Search">
    </div>
</div>
