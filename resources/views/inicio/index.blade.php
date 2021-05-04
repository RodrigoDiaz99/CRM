<x-app-layout title="CRM | Elementos">
    <div class="p-4">
        <div class="w-full overflow-hidden rounded-lg">
            <div
                class="w-full overflow-x-auto font-semibold tracking-wide text-left dark:border-gray-700 bg-white rounded-md dark:bg-darker mt-4 mb-4">
                <div class="text-center">
                    @if (Session::has('success'))
                        <div class="bg-green-100 rounded-md p-3 mb-2 flex">
                            <svg class="stroke-2 stroke-current text-green-600 h-8 w-8 mr-2 flex-shrink-0"
                                viewBox="0 0 24 24" fill="none" strokeLinecap="round" strokeLinejoin="round">
                                <path d="M0 0h24v24H0z" stroke="none" />
                                <circle cx="12" cy="12" r="9" />
                                <path d="M9 12l2 2 4-4" />
                            </svg>

                            <div class="text-green-700">
                                <div class="font-bold text-xl">Producto guardado o modificada</div>
                            </div>
                        </div>

                    @endif
                    <div class="text-center mt-3">
                        <h1 class="text-4xl">¡Bienvenido al catalogo de productos {{ Auth::user()->first_name }}!</h1>

                        <p>Aquí el super administrador podrá realizar las modificaciones pertinentes a los productos</p>
                        <p class="small text-center"></p>
                    </div>
                    @if (count($content1) > 0)

                    @else
                        <div class="btn-group py-2">
                            <a href="{{ route('create_one') }}"
                                class="bg-transparent hover:bg-green-400 text-green-500 font-semibold hover:text-white py-2 px-4 border border-green-400 hover:border-transparent rounded">
                                <i class="fas fa-plus mr-2"></i>
                                <span>Primer banner</span>
                            </a>
                        </div>
                    @endif
                    @if (count($content2) > 0)

                    @else
                        <div class="btn-group py-2">
                            <a href={{ route('create_second') }}""
                                class="bg-transparent hover:bg-green-400 text-green-500 font-semibold hover:text-white py-2 px-4 border border-green-400 hover:border-transparent rounded">
                                <i class="fas fa-plus mr-2"></i>
                                <span>Segundo banner</span>
                            </a>
                        </div>
                    @endif

                    @if (count($content3) > 0)

                    @else
                        <div class="btn-group py-2">
                            <a href="{{ route('create_three') }}"
                                class="bg-transparent hover:bg-green-400 text-green-500 font-semibold hover:text-white py-2 px-4 border border-green-400 hover:border-transparent rounded">
                                <i class="fas fa-plus mr-2"></i>
                                <span>Tercer banner banner</span>
                            </a>
                        </div>
                    @endif

                </div>
                <div class="table-responsive">
                    <div class="grid grid-cols-4 sm:grid-cols-1 md:grid-cols-4">
                        @forelse ($content1 as $row )


                            <div
                                class="max-w-sm w-full sm:w-1/2 lg:w-1/3 py-3 px-3 bg-white rounded-md dark:bg-darker mt-4 mb-4">
                                <div class="shadow-xl overflow-hidden bg-white rounded-lg dark:bg-darker mt-4 mb-4">
                                    <div class="px-4 py-2 text-center bg-white rounded-md dark:bg-darker mt-4 mb-4">
                                        <h1 class="text-black text-3xl uppercase dark:text-primary-white">
                                            {{ $row->title }}
                                        </h1>
                                        <p class="text-blue-500 text-sm mt-1 dark:text-primary-light">
                                            {{ $row->description }}
                                        </p>
                                    </div>
                                    <div class="text-center">
                                        <img class="h-56 w-full object-cover mt-2 center"
                                            src="{{ Storage::url($row->img_paths) }}" alt="banner1">


                                    </div>


                                    <div class="flex p-4 border-t border-gray-300 text-gray-700">
                                        <div class="flex-1 inline-flex justify-between items-center">
                                            <a href=""
                                                class="bg-transparent hover:bg-yellow-200 text-yellow-500 font-semibold hover:text-white py-2 px-4 border border-yellow-400 hover:border-transparent rounded">
                                                <i class="far fa-edit"></i>
                                            </a>

                                            <form action="" method="POST">
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


                        @empty

                        @endforelse
                        @forelse ( $content2 as $row )


                            <div
                                class="max-w-sm w-full sm:w-1/2 lg:w-1/3 py-3 px-3 bg-white rounded-md dark:bg-darker mt-4 mb-4">
                                <div class="shadow-xl overflow-hidden bg-white rounded-lg dark:bg-darker mt-4 mb-4">
                                    <div class="px-4 py-2 text-center bg-white rounded-md dark:bg-darker mt-4 mb-4">
                                        <h1 class="text-black text-3xl uppercase dark:text-primary-white">
                                            {{ $row->title }}
                                        </h1>
                                        <p class="text-blue-500 text-sm mt-1 dark:text-primary-light">
                                            {{ $row->description }}
                                        </p>
                                    </div>
                                    <div class="text-center">
                                        <img class="h-56 w-full object-cover mt-2 center"
                                            src="{{ Storage::url($row->img_paths) }}" alt="banner1">


                                    </div>


                                    <div class="flex p-4 border-t border-gray-300 text-gray-700">
                                        <div class="flex-1 inline-flex justify-between items-center">
                                            <a href=""
                                                class="bg-transparent hover:bg-yellow-200 text-yellow-500 font-semibold hover:text-white py-2 px-4 border border-yellow-400 hover:border-transparent rounded">
                                                <i class="far fa-edit"></i>
                                            </a>

                                            <form action="" method="POST">
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


                        @empty

                        @endforelse
                        @forelse ( $content3 as $row )

                            <div
                                class="max-w-sm w-full sm:w-1/2 lg:w-1/3 py-3 px-3 bg-white rounded-md dark:bg-darker mt-4 mb-4">
                                <div class="shadow-xl overflow-hidden bg-white rounded-lg dark:bg-darker mt-4 mb-4">
                                    <div class="px-4 py-2 text-center bg-white rounded-md dark:bg-darker mt-4 mb-4">
                                        <h1 class="text-black text-3xl uppercase dark:text-primary-white">
                                            {{ $row->title }}
                                        </h1>
                                        <p class="text-blue-500 text-sm mt-1 dark:text-primary-light">
                                            {{ $row->description }}
                                        </p>
                                    </div>
                                    <div class="text-center">
                                        <img class="h-56 w-full object-cover mt-2 center"
                                            src="{{ Storage::url($row->img_paths) }}" alt="banner1">


                                    </div>


                                    <div class="flex p-4 border-t border-gray-300 text-gray-700">
                                        <div class="flex-1 inline-flex justify-between items-center">
                                            <a href=""
                                                class="bg-transparent hover:bg-yellow-200 text-yellow-500 font-semibold hover:text-white py-2 px-4 border border-yellow-400 hover:border-transparent rounded">
                                                <i class="far fa-edit"></i>
                                            </a>

                                            <form action="" method="POST">
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


                        @empty

                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
