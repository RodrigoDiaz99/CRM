<x-app2-layout>
    <main class="my-8">
        <div class="container mx-auto px-6">


            <div class="h-64 rounded-md overflow-hidden bg-cover bg-center"
                style="background-image: url('https://images.unsplash.com/photo-1577655197620-704858b270ac?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1280&q=144')">
                <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">

                    <div class="px-10 max-w-xl">
                        <h2 class="text-2xl text-white font-semibold">Sport Shoes</h2>
                        <p class="mt-2 text-gray-400">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempore
                            facere provident molestias ipsam sint voluptatum pariatur.</p>
                        <button
                            class="flex items-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                            <span>Shop Now</span>
                            <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="md:flex mt-8 md:-mx-4">
                <div class="w-full h-64 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:w-1/2"
                    style="background-image: url('https://images.unsplash.com/photo-1547949003-9792a18a2601?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80')">
                    <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                        <div class="px-10 max-w-xl">
                            <h2 class="text-2xl text-white font-semibold">Back Pack</h2>
                            <p class="mt-2 text-gray-400">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                Tempore facere provident molestias ipsam sint voluptatum pariatur.</p>
                            <button
                                class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                                <span>Shop Now</span>
                                <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="w-full h-64 mt-8 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:mt-0 md:w-1/2" style="background-image: url('https://images.unsplash.com/photo-1486401899868-0e435ed85128?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80')">
                    <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                        <div class="px-10 max-w-xl">
                            <h2 class="text-2xl text-white font-semibold">Games</h2>
                            <p class="mt-2 text-gray-400">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempore facere provident molestias ipsam sint voluptatum pariatur.</p>
                            <button class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                                <span>Shop Now</span>
                                <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </main>
    @if (Route::has('login'))

    @auth

    <div class="min-w-screen min-h-screen bg-gray-50 flex items-center justify-center py-5">
        <div class="w-full bg-white border-t border-b border-gray-200 px-5 py-16 md:py-24 text-gray-800 font-light">
            <div class="w-full max-w-6xl mx-auto pb-5">
                <div class="-mx-3 md:flex items-center">
                    <div class="px-3 md:w-2/3 mb-10 md:mb-0">
                        <h1 class="text-6xl md:text-8xl font-bold mb-5 leading-tight">Bienvenido <br class="hidden md:block">de regreso</h1>
                        <h2 class="text-gray-600 mb-7 md:text-4xl leading-tight">{{auth()->user()->first_name}}</h2>
                        <div>
                            <span class="inline-block w-40 h-1 rounded-full bg-blue-500"></span>
                            <span class="inline-block w-3 h-1 rounded-full bg-blue-500 ml-1"></span>
                            <span class="inline-block w-1 h-1 rounded-full bg-blue-500 ml-1"></span>
                        </div>
                    </div>
                    <div class="px-3 md:w-1/3">
                        <form>

                            <div>
                                <a class="block w-full bg-blue-500 hover:bg-blue-700 focus:bg-blue-700 transition-colors text-white rounded-lg px-3 py-2 font-semibold" href="{{route('shop')}}">Tienda</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @else
    <div class="min-w-screen min-h-screen bg-gray-50 flex items-center justify-center py-5">
        <div class="w-full bg-white border-t border-b border-gray-200 px-5 py-16 md:py-24 text-gray-800 font-light">
            <div class="w-full max-w-6xl mx-auto pb-5">
                <div class="-mx-3 md:flex items-center">
                    <div class="px-3 md:w-2/3 mb-10 md:mb-0">
                        <h1 class="text-6xl md:text-8xl font-bold mb-5 leading-tight">Gracias <br class="hidden md:block">Por visitarnos</h1>
                        <h3 class="text-gray-600 mb-7 leading-tight">Te invitamos a comprar con nosotros</h3>
                        <div>
                            <span class="inline-block w-40 h-1 rounded-full bg-blue-500"></span>
                            <span class="inline-block w-3 h-1 rounded-full bg-blue-500 ml-1"></span>
                            <span class="inline-block w-1 h-1 rounded-full bg-blue-500 ml-1"></span>
                        </div>
                    </div>
                    <div class="px-3 md:w-1/3">
                        <form>

                            <div>
                                <a class="block w-full bg-blue-500 hover:bg-blue-700 focus:bg-blue-700 transition-colors text-white rounded-lg px-3 py-2 font-semibold-center" href="{{route('register')}}">Registrate</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @endauth

@endif


    @include('store.shoppingCart', ['shoppingItems' => $shoppingItems ?? ''])

    <div class="container mx-auto px-6">


        <div class="mt-16">
            <h3 class="text-gray-600 text-2xl font-medium">Mas Productos</h3>
            <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                <?php $count = 0; ?>

                @foreach ($productos as $row)
                    <?php if ($count == 4) {
                    break;
                    } ?>
                    <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                        <div class="flex items-end justify-end h-56 w-full bg-cover"
                            style="background-image: url('{{ Storage::url($row->img_paths) }}')">
                            <a href="{{ route('addShopingCart', $row->id) }}"
                                class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                        <div class="px-5 py-3">
                            <h3 class="text-gray-700 uppercase"><a
                                    href="{{ route('details.show', $row->id) }}">{{ $row->name }}</a></h3>
                            <span class="text-gray-500 mt-2">${{ $row->inventories['0']->sale_price }}</span>
                        </div>
                    </div>


                    <?php $count++; ?>
                @endforeach
            </div>
        </div>
    </div>
</x-app2-layout>
