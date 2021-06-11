<x-app-layout>
    <div class="p-4">
        <div class="w-full overflow-hidden rounded-lg">
            <div class="w-full overflow-x-auto font-semibold tracking-wide text-left bg-white rounded-md dark:bg-darker mt-4 mb-4">
                @if (Session::has('success'))
                <div class="bg-green-100 rounded-md p-3 mb-2 flex">
                    <svg class="stroke-2 stroke-current text-green-600 h-8 w-8 mr-2 flex-shrink-0" viewBox="0 0 24 24" fill="none" strokeLinecap="round" strokeLinejoin="round">
                        <path d="M0 0h24v24H0z" stroke="none" />
                        <circle cx="12" cy="12" r="9" />
                        <path d="M9 12l2 2 4-4" />
                    </svg>
                    <div class="text-green-700">
                        <div class="font-bold text-xl">Categoría guardada o modificada</div>
                    </div>
                </div>
                @endif
                <div class="text-center mt-3">
                    <h1 class="text-4xl">¡Bienvenido {{ Auth::user()->first_name }}! </h1>
                    <p class="text-center font-italic">En esta sección se hace la administración de las categorías
                        de
                        los
                        productos.
                    <p class="small text-center"></p>
                    <div class="btn-group py-2">
                        <a href="{{ route('category.create') }}" class="bg-transparent hover:bg-green-400 text-green-500 font-semibold hover:text-white py-2 px-4 border border-green-400 hover:border-transparent rounded">
                            <i class="fas fa-plus mr-2"></i>
                            <span>Añadir contenido</span>
                        </a>
                    </div>
                </div>
                <div></div>
                <div class="w-full overflow-hidden tracking-wide text-left shadow-xs bg-white rounded-md dark:bg-darker mt-4 mb-4">
                    <div class="w-full overflow-x-auto">
                        <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white rounded-md dark:bg-darker mt-4 mb-4">
                            <table class="min-w-full">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 uppercase dark:text-primary-light">
                                            Nombre </th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 uppercase dark:text-primary-light">
                                            Apellidos</th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 uppercase dark:text-primary-light">
                                            Teléfono </th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 uppercase dark:text-primary-light">
                                            Ciudad </th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 uppercase dark:text-primary-light">
                                            Estado </th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 uppercase dark:text-primary-light">
                                            Dirección </th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 uppercase dark:text-primary-light">
                                            Número exterior </th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 uppercase dark:text-primary-light">
                                            Colonia </th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 uppercase dark:text-primary-light">
                                            Código Postal </th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 uppercase dark:text-primary-light">
                                            Referencia </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white rounded-md dark:bg-darker mt-4 mb-4 ">
                                    {{-- --}}
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                            <div class="text-sm font-semibold">{{ $row->name }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                            <div class="text-sm font-semibold">{{ $row->last_name }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                            <div class="text-sm font-semibold">{{ $row->phone }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                            <div class="text-sm font-semibold">{{ $row->country }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                            <div class="text-sm font-semibold">{{ $row->state }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                            <div class="text-sm font-semibold">{{ $row->street }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                            <div class="text-sm font-semibold">{{ $row->number_exterior }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                            <div class="text-sm font-semibold">{{ $row->suburb }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                            <div class="text-sm font-semibold">{{ $row->zip }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                            <div class="text-sm font-semibold">{{ $row->reference }}</div>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                            {{-- --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>