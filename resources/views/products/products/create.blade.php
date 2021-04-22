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
                                <h2 class="leading-relaxed text-blue-500 uppercase dark:text-primary-light">Subir Producto</h2>
                                <p class="text-sm text-black font-normal leading-relaxed">Llena este formulario para
                                    guardar un nuevo proyecto</p>
                            </div>
                        </div>
                        <div class="divide-y divide-gray-200 ">
                            <form action="{{ route('products.store') }}" enctype="multipart/form-data" method="POST">
                                @csrf

                                <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                    <div class="flex flex-col">
                                        <label class="leading-loose text-blue-500 uppercase dark:text-primary-light">Nombre del producto</label>
                                        <input type="text" name="name" id="name" onkeyup="mayus(this);" style="text-transform: uppercase;" class="px-4 py-2 border focus:ring-gray-500 focus:border-green-500 w-full sm:text-sm border-blue-500 rounded-md focus:outline-none text-gray-600" placeholder="Nombre del producto" required autofocus>
                                    </div>

                                    <div class="flex flex-col">
                                        <label class="leading-loose text-blue-500 uppercase dark:text-primary-light">Descripcion producto</label>
                                        <input type="text" name="description" id="description" onkeyup="mayus(this);" style="text-transform: uppercase;" class="px-4 py-2 border focus:ring-gray-500 w-full sm:text-sm border-blue-500 rounded-md focus:outline-none text-gray-600" placeholder="Descripcion del producto" required>
                                    </div>

                                    <div class="form-group row">
                                        <label for="direction" class="col-md-4 col-form-label text-md-right text-blue-500 uppercase dark:text-primary-light">Categoria</label>
                                        <div class="col-md-6">
                                            <select name="category_id" id="category_id" class="px-4 py-2 border focus:ring-gray-500 border-blue-500 rounded-md focus:outline-none block w-full pl-10 mt-1 text-sm text-black" required>

                                                <option value="" selected>Seleccione una categoria</option>

                                                @foreach ($category as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                        <label class="leading-loose text-blue-500 uppercase dark:text-primary-light">Miniatura</label>

                                        <label class="w-full flex flex-col items-center px-4 py-2 bg-white text-blue-500 rounded-lg shadow-lg tracking-wide uppercase border border-blue-500 cursor-pointer hover:bg-blue-500 hover:text-white">
                                            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                            </svg>
                                            <span id="coverRecive" class="mt-2 text-base leading-normal">SELECCIONE
                                                MINIATURA</span>
                                            <input type='file' accept="image/png, image/jpeg, image/jpg" id="cover_file" id="cover_file" name="cover_file" class="hidden" required />

                                        </label>
                                    </div>

                                    <div class="flex flex-col">
                                        <label class="leading-loose text-blue-500 uppercase dark:text-primary-light">Cantidad de productos</label>
                                        <input type="number" min="1" name="total_count" id="total_count" class="px-4 py-2 border focus:ring-gray-500 focus:border-green-500 w-full sm:text-sm border-blue-500 rounded-md focus:outline-none text-gray-600" placeholder="100" required>
                                    </div>
                                    <div class="flex flex-col">
                                        <label class="leading-loose text-blue-500 uppercase dark:text-primary-light">Precio compra</label>
                                        <input oninput="salePriceCalculator()" type="number" min="1" name="purchase_price" id="purchase_price" step="any" class="px-4 py-2 border focus:ring-gray-500 focus:border-green-500 w-full sm:text-sm border-blue-500 rounded-md focus:outline-none text-gray-600" placeholder="35" required>
                                    </div>
                                    <div class="flex flex-col">
                                        <label class="leading-loose text-blue-500 uppercase dark:text-primary-light">Margen ganancia %</label>
                                        <input oninput="salePriceCalculator()" type="number" min="1" name="percent_of_profit" id="percent_of_profit" step="any" class="px-4 py-2 border focus:ring-gray-500 focus:border-green-500 w-full sm:text-sm border-blue-500 rounded-md focus:outline-none text-gray-600" placeholder="10" required>
                                    </div>
                                    <div class="flex flex-col">
                                        <label class="leading-loose text-blue-500 uppercase dark:text-primary-light">Precio venta</label>
                                        <input oninput="percentProfitCalculator()" type="number" min="1" name="sale_price" id="sale_price" step="any" class="px-4 py-2 border focus:ring-gray-500 focus:border-green-500 w-full sm:text-sm border-blue-500 rounded-md focus:outline-none text-gray-600" placeholder="38.5" required>
                                    </div>
                                    <div class="flex flex-col">
                                        <label class="leading-loose text-blue-500 uppercase dark:text-primary-light">Costo de Envio</label>
                                        <input type="number" min="1" name="cost_of_shipping" id="cost_of_shipping" step="any" class="px-4 py-2 border focus:ring-gray-500 focus:border-green-500 w-full sm:text-sm border-blue-500 rounded-md focus:outline-none text-gray-600" placeholder="150.25" required>
                                    </div>



                                </div>
                                <div class="pt-4 flex items-center space-x-4">

                                    <button type="submit" class="w-full flex-col bg-transparent hover:bg-blue-400 text-blue-500 font-semibold hover:text-white py-2 px-1 border border-blue hover:border-transparent rounded">
                                        <i class="fas fa-upload mx-2"></i>
                                        <span>Subir Producto</span>
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('cover_file').onchange = function() {
            console.log(this.value);
            document.getElementById('coverRecive').innerHTML = document.getElementById('cover_file').files[0].name;
        }
    </script>
    <script>
        function mayus(e) {
            e.value = e.value.toUpperCase();
        }
    </script>
</x-app-layout>