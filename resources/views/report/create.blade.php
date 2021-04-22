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
                                <h2 class="leading-relaxed text-blue-500 uppercase dark:text-primary-light">Crear reporte</h2>
                                <p class="text-sm text-black font-normal leading-relaxed">Llena este formulario para
                                    guardar un nuevo reporte/p>
                            </div>
                        </div>
                        <div class="divide-y divide-gray-200 ">
                            <form action="{{ route('report.store') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="direction" class="col-md-4 col-form-label text-md-right text-blue-500 uppercase dark:text-primary-light">Fondo de efectivo</label>
                                    <div class="col-md-6">
                                        <select name="cash_fund_id" id="cash_fund_id" required class="px-4 py-2 border focus:ring-gray-500 border-blue-500 rounded-md focus:outline-none block w-full pl-10 mt-1 text-sm text-black">
                                            <option value="" selected>Seleccione un fondo de efectivo</option>
                                            @foreach ($cashfund as $row)
                                            <option value="{{ $row->id }}">{{ $row->id }} - ${{ $row->money }}</option>
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="direction" class="col-md-4 col-form-label text-md-right text-blue-500 uppercase dark:text-primary-light">Usuario</label>
                                    <div class="col-md-6">
                                        <select name="user_id" id="user_id" required class="px-4 py-2 border focus:ring-gray-500 border-blue-500 rounded-md focus:outline-none block w-full pl-10 mt-1 text-sm text-black">
                                            <option value="" selected>Seleccione un usuario</option>
                                            @foreach ($users as $row)
                                            <option value="{{ $row->id }}">{{ $row->first_name }} {{ $row->second_name }} {{ $row->first_last_name }} {{ $row->second_last_name }}</option>
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                        </div>
                        <div class="pt-4 flex items-center space-x-4">

                            <button type="submit" class="w-full flex-col bg-transparent hover:bg-blue-400 text-blue-500 font-semibold hover:text-white py-2 px-1 border border-blue hover:border-transparent rounded">
                                <i class="fas fa-upload mx-2"></i>
                                <span>Crear reporte</span>
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