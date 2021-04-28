<x-app-layout>

    <div class="p-4">
        <div class="w-full overflow-hidden rounded-lg">

            {{-- --}}

            <div class="text-center mt-3">
                <h1 class="text-4xl">En esta sección se agregan las categorias de los productos.</h1>
                <p class="small text-center"></p>


                {{-- <div class="btn-group py-2">
                        <a href="{{ route('category.index') }}"
                class="bg-transparent hover:bg-green-400 text-green-500 font-semibold hover:text-white py-2 px-4 border border-green-400 hover:border-transparent rounded">
                <i class="fas fa-plus mr-2"></i>
                <span>Ir a Lista</span>
                </a>
            </div> --}}
        </div>

        {{-- --}}


        <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white rounded-md dark:bg-darker mt-4 mb-4">

            <div class="container flex flex-col justify-center items-center mx-auto my-8 py-10">
                <div style="background-image: url(https://images.unsplash.com/photo-1538582709238-0a503bd5ae04?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80)" class="max-w-5xl bg-gray-300 h-64 w-full rounded-lg shadow-md bg-cover bg-center">
                </div>

                <!-- Card -->
                <div class="bg-white dark:bg-darker -mt-24 shadow-md rounded-lg overflow-hidden">
                    <div class="items-center justify-between py-10 px-5 bg-white shadow-2xl rounded-lg mx-auto text-center dark:bg-darker mb-4">
                        <div class="px-2 -mt-6">
                            <div class="text-center">
                                <h1 class="font-normal text-3xl text-grey-800 leading-loose my-3 w-full">
                                    Ingresar categoria</h1>
                                <div class="w-full text-center">
                                    <form action="{{ route('category.store') }}" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <div class="col-span-6 sm:col-span-4 max-w-sm mx-auto p-1 pr-0 flex items-center">
                                            <input type="text" id="name" name="name" class="flex-1 appearance-none rounded shadow p-3 text-dark mr-2 focus:outline-none" required>

                                            <button type="submit" class="bg-blue-600 text-white text-base font-semibold rounded-md shadow-md hover:bg-indigo-600 p-3">Agregar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>
        </div>



        <!-- end -->


    </div>
    </div>
</x-app-layout>