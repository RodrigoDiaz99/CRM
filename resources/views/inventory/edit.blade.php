<x-app-layout>

    <div class="p-4">Sclass="leading-loose text-blue-500 uppercase dark:text-primary-light">Margen ganancia %</label>
                                    <input oninput="salePriceCalculator()" value="{{$inventory->percent_of_profit}}" step="any" type="number" min="1" name="percent_of_profit" id="percent_of_profit" class="px-4 py-2 border focus:ring-gray-500 focus:border-green-500 w-full sm:text-sm border-blue-500 rounded-md focus:outline-none text-gray-600" placeholder="10" required autofocus>
                                </div>
                                <div class="flex flex-col">
                                    <label class="leading-loose text-blue-500 uppercase dark:text-primary-light">Precio venta</label>
                                    <input oninput="percentProfitCalculator()" value="{{$inventory->sale_price}}" step="any" type="number" min="1" name="sale_price" id="sale_price" class="px-4 py-2 border focus:ring-gray-500 focus:border-green-500 w-full sm:text-sm border-blue-500 rounded-md focus:outline-none text-gray-600" placeholder="38.5" required autofocus>
                                </div>
                                <div class="flex flex-col">
                                    <label class="leading-loose text-blue-500 uppercase dark:text-primary-light">Costo de Envio</label>
                                    <input  type="number" min="1" name="cost_of_shipping" id="cost_of_shipping" step="any" value="{{$inventory->cost_of_shipping}}"
                                        class="px-4 py-2 border focus:ring-gray-500 focus:border-green-500 w-full sm:text-sm border-blue-500 rounded-md focus:outline-none text-gray-600"
                                        placeholder="150.25" required autofocus>
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

</x-app-layout>
