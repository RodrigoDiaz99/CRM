<x-app-layout>

    <div class="p-4">
        <div class="w-full overflow-hidden rounded-lg">

            <div class="relative py-3 sm:max-w-xl sm:mx-auto ">
                <div class="relative px-4 py-10 bg-white text-center dark:bg-darker mb-4 mx-8 md:mx-0 shadow rounded-3xl sm:p-10">

                    <div class="max-w-md mx-auto">
                        <div class="flex items-center space-x-5">
                            <div class="h-14 w-14 bg-yellow-200 rounded-full flex flex-shrink-0 justify-center items-center text-yellow-500 text-2xl font-mono">
                                SP</div>
                            <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                                <h2 class="leading-relaxed text-blue-500 uppercase dark:text-primary-light">Subir inventario</h2>
                                <p class="text-sm text-black font-normal leading-relaxed">Llena este formulario para
                                    guardar un nuevo proyecto</p>
                            </div>
                        </div>
                        <div class="divide-y divide-gray-200 ">
                            <form action="{{ route('inventory.store') }}" enctype="multipart/form-data" method="POST">
                                @csrf


                                <div class="form-group row">
                                    <label for="direction" class="col-md-4 col-form-label text-md-right text-blue-500 uppercase dark:text-primary-light">Producto</label>
                                    <div class="col-md-6">
                                        <select name="product_id" id="product_id" required class="px-4 py-2 border focus:ring-gray-500 border-blue-500 rounded-md focus:outline-none block w-full pl-10 mt-1 text-sm text-black">

                                            <option value="" selected>Seleccione un producto</option>
                                            @foreach ($product as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="flex flex-col">
                                    <label class="leading-loose text-blue-500 uppercase dark:text-primary-light">Cantidad de productos</label>
                                    <input type="number" min="1" name="total_count" id="total_count" step="0.01" class="px-4 py-2 border focus:ring-gray-500 focus:border-green-500 w-full sm:text-sm border-blue-500 rounded-md focus:outline-none text-gray-600" placeholder="100" required autofocus>
                                </div>
                                <div class="flex flex-col">
                                    <label class="leading-loose text-blue-500 uppercase dark:text-primary-light">Precio compra</label>
                                    <input oninput="salePriceCalculator()" type="number" min="1" step="0.01" name="purchase_price" id="purchase_price" class="px-4 py-2 border focus:ring-gray-500 focus:border-green-500 w-full sm:text-sm border-blue-500 rounded-md focus:outline-none text-gray-600" placeholder="35" required autofocus>
                                </div>
                                <div class="flex flex-col">
                                    <label class="leading-loose text-blue-500 uppercase dark:text-primary-light">Margen ganancia %</label>
                                    <input oninput="salePriceCalculator()" type="number" min="1" step="0.01" name="percent_of_profit" id="percent_of_profit" class="px-4 py-2 border focus:ring-gray-500 focus:border-green-500 w-full sm:text-sm border-blue-500 rounded-md focus:outline-none text-gray-600" placeholder="10" required autofocus>
                                </div>
                                <div class="flex flex-col">
                                    <label class="leading-loose text-blue-500 uppercase dark:text-primary-light">Precio venta</label>
                                    <input oninput="percentProfitCalculator()" type="number" min="1" step="0.01" name="sale_price" id="sale_price" class="px-4 py-2 border focus:ring-gray-500 focus:border-green-500 w-full sm:text-sm border-blue-500 rounded-md focus:outline-none text-gray-600" placeholder="38.5" required autofocus>
                                </div>
                                <div class="flex flex-col">
                                    <label class="leading-loose text-blue-500 uppercase dark:text-primary-light">Costo de Envio</label>
                                    <input type="number" min="1" name="cost_of_shipping" id="cost_of_shipping" step="any" class="px-4 py-2 border focus:ring-gray-500 focus:border-green-500 w-full sm:text-sm border-blue-500 rounded-md focus:outline-none text-gray-600" placeholder="150.25" required autofocus>
                                </div>

                        </div>
                        <div class="pt-4 flex items-center space-x-4">

                            <button type="submit" class="w-full flex-col bg-transparent hover:bg-blue-400 text-blue-500 font-semibold hover:text-white py-2 px-1 border border-blue hover:border-transparent rounded">
                                <i class="fas fa-upload mx-2"></i>
                                <span>Subir inventario</span>
                            </button>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>