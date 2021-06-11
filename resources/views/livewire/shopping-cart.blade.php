<div :class="cartOpen ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'" class="fixed right-0 top-0 max-w-xs w-full h-full px-6 py-4 transition duration-300 transform overflow-y-auto bg-white border-l-2 border-gray-300">
    <div class="flex items-center justify-between">
        <h3 class="text-2xl font-medium text-gray-700">Tu Carrito</h3>
        <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none">
            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>
    <hr class="my-3">
    @if(Auth::id() != null)
        @forelse ($shoppingItems as $item)
            <div class="flex-col justify-between mt-6">
                <div class="flex">
                    <img class="h-20 w-20 object-cover rounded" src="{{ Storage::url($item->products->img_paths) }}" alt="{{ Storage::url($item->products->name) }}">
                    <div class="mx-3">
                        <h3 class="text-sm text-gray-600">{{ $item->products->name }}</h3>
                        <div class="flex items-center mt-2">
                            <button wire:click="ItemSum({{ $item->products->id }})" class="text-gray-500 focus:outline-none focus:text-gray-600">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </button>
                            <span class="text-gray-700 mx-2">{{ $item->quantity }}</span>
                            <button wire:click="ItemRest({{ $item->products->id }})" class="text-gray-500 focus:outline-none focus:text-gray-600">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="px-2 py-2">
                    <span class="text-blue-500 float-left">${{ $item->price }}P/U</span>
                    <span class="text-red-500 float-right">${{ $item->subtotal }}</span>
                </div>
            </div>
        @empty
            <h2>Carrito Vacío!</h2>
        @endforelse

        <!--<div class="mt-8">
            <form class="flex items-center justify-center">
                <input class="form-input w-48" type="text" placeholder="Agregar Promoción">
                <button class="ml-3 flex items-center px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                    <span>APLICAR</span>
                </button>
            </form>
        </div>-->
        <a href="{{route('checkout')}}"class="flex items-center justify-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
            <span>Checkout</span>
            <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
        </a>

    @else
        <small class="text-red-400">Inicia Sesión, Para poder ver tu carrito!</small>
        <a href="{{ route('login') }}" class="flex w-full mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Iniciar Sesión
        </a>

        <a href="{{ route('register') }}" class="flex w-full mt-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
            Registrate
        </a>
    @endif

</div>

