<x-app-layout>
    <div class="p-4">
        <div class="w-full overflow-hidden rounded-lg">
            <div class="w-full overflow-x-auto font-semibold tracking-wide text-left bg-white rounded-md dark:bg-darker mt-4 mb-4">

                <div class="text-center mt-3">
                    <h1 class="text-4xl">¡Bienvenido {{ Auth::user()->first_name }}! </h1>
                    <p class="text-center font-italic">En esta sección vez los daos de este pediso

                    <p class="small text-center"></p>

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
