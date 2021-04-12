<x-app-layout>
    <div class="p-4">
        <div class="w-full overflow-hidden rounded-lg">
            <div
                class="w-full overflow-x-auto font-semibold tracking-wide text-left text-gray-500 border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <div class="text-center">


                    <div class="text-center my-3">
                        <h1 class="text-4xl">¡Bienvenido al catalogo de productos {{ Auth::user()->name }}! </h1>

                        <p>Aquí el super administrador podrá realizar las modificaciones pertinentes a los productos
                        </p>




                    </div>

                    <div class="btn-group py-2">
                        <a href="{{ route('products.create') }}"
                            class="bg-transparent hover:bg-green-400 text-green-500 font-semibold hover:text-white py-2 px-4 border border-green-400 hover:border-transparent rounded">
                            <i class="fas fa-plus mr-2"></i>
                            <span>Subir conferencias</span>
                        </a>
                    </div>

                </div>

                <div class="table-responsive">

                    <h1
                        class="text-center text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800 text-3xl">
                        CONFERENCIAS</h1>
                    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4">

                        @foreach ($product as $row)
                            <div class="max-w-sm w-full sm:w-1/2 lg:w-1/3 py-3 px-3">
                                <div
                                    class="shadow-xl rounded-lg overflow-hidden text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    {{--<div class="bg-cover bg-center h-56 p-4"
                                        style="background-image: url({{ Storage::url($row->img_paths) }})">
                                        <img href=“” alt=“error”>
                                    </div>--}}
                                    <img href="{{Storage::url($row->img_paths)}}" alt="error">
                                    <div class="p-4">
                                        <p class="text-md italic bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                            Conferencia</p>
                                        <p class="text-md italic bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                            {{ $row->name }}</p>

                                    </div>

                                    <div class="flex p-4 border-t border-gray-300 text-gray-700">
                                        <div class="flex-1 inline-flex justify-between items-center">
                                            <a href="{{ route('products.edit', $row->id) }}"
                                                class="bg-transparent hover:bg-yellow-200 text-yellow-500 font-semibold hover:text-white py-2 px-4 border border-yellow-400 hover:border-transparent rounded">
                                                <i class="far fa-edit"></i>
                                            </a>

                                            <form action="{{ route('products.destroy', $row->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="bg-transparent hover:bg-red-400 text-red-500 font-semibold hover:text-white py-2 px-4 border border-red-400 hover:border-transparent rounded">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        @endforeach






                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
