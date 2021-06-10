<x-app2-layout>
    <div class="container mx-auto px-6">
        <div class="flex space-x-2">
            <div class="flex-1 ...">

            </div>
            @foreach ($ShoppingCart as $item)

            <div class="flex-1 ...">
                <div class="max-w-xs rounded overflow-hidden shadow-lg my-2">

                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">Productos</div>
                        <div class="max-w-xs bg-white shadow-lg rounded-lg overflow-hidden my-10">
                            <div class="px-4 py-2">
                                <h1 class="text-gray-900 font-bold text-3xl uppercase">{{ $item->products->name }}</h1>

                            </div>
                            <img class="h-20 w-20 object-cover rounded" src="{{ Storage::url($item->products->img_paths) }}" alt="{{ Storage::url($item->products->name) }}">

                            <div class="flex items-center justify-between px-4 py-2 bg-gray-900">
                                <h1 class="text-gray-200 font-bold text-xl">$129</h1>
                                <h1 class="px-3 py-1 bg-gray-200 text-sm text-gray-900 font-semibold rounded">Costo
                                    envio</h1>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-4">

                    </div>
                </div>
                @endforeach

            </div>
            <div class="flex-1 ...">
                <div class="max-w-xs rounded overflow-hidden shadow-lg my-2">

                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">Confirmar Compra</div>
                        <div class="min-h-screen bg-white p-4 flex items-center">


                            <!-- Success -->
                            <div
                                class="bg-green-50 p-4 rounded flex items-start text-green-600 my-4 shadow-lg max-w-xl mx-auto">
                                <div class="text-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 pt-1"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.959 17l-4.5-4.319 1.395-1.435 3.08 2.937 7.021-7.183 1.422 1.409-8.418 8.591z" />
                                    </svg>
                                </div>
                                <div class=" px-3">
                                    <h3 class="text-green-800 font-semibold tracking-wider">
                                        Success
                                    </h3>
                                    <p class="py-2 text-green-700">
                                        Gracias por tu compra, El/los producto(s) llegaran en un maximo de 15 dias,
                                        Porfavor de estar en su locación para recibir el producto
                                    </p>
                                    <div class="space-x-6">

                                        <a href="{{ route('welcome') }}"
                                            class="text-green-900 font-semibold tracking-wider hover:underline focus:outline-none">Ir
                                            a la tienda</a>
                                    </div>
                                </div>
                            </div>


                            <!-- Link on the right -->
                        </div>


                    </div>

                </div>
            </div>



        </div>
    </div>

</x-app2-layout>
