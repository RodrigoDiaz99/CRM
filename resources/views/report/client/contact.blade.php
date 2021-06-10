<x-app-layout>
    <div class="p-4">
        <div class="w-full overflow-hidden rounded-lg">
            <div
                class="w-full overflow-x-auto font-semibold tracking-wide text-left bg-white rounded-md dark:bg-darker mt-4 mb-4">

                <div class="text-center mt-3">
                    <h1 class="text-4xl">¡Bienvenido {{ Auth::user()->first_name }}! </h1>
                    <p class="text-center font-italic">En esta sección se hace la administración de los reportes.
                    <p class="small text-center"></p>



                </div>

                <div></div>
                <div
                    class="w-full overflow-hidden tracking-wide text-left shadow-xs bg-white rounded-md dark:bg-darker mt-4 mb-4">
                    <div class="w-full overflow-x-auto">
                        <div
                            class="align-middle inline-block min-w-full shadow overflow-hidden bg-white rounded-md dark:bg-darker mt-4 mb-4">

                            <div
                                class="relative px-4 py-10 bg-white text-center dark:bg-darker mb-4 mx-8 md:mx-0 shadow rounded-3xl sm:p-10">

                                <div class="space-y-4 ...">
                                    <div class="max-w-md mx-auto">
                                        <form action="{{ route('contact.store',$user->id) }}" class="w-full max-w-lg"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="flex flex-wrap -mx-3 mb-6">
                                                <div class="w-full px-3">
                                                    <label for="name"
                                                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                                        Titulo
                                                    </label>
                                                    <input name="title" id="title" required
                                                        class="px-4 py-2 border focus:ring-gray-500 w-full sm:text-sm border-blue-500 rounded-md focus:outline-none text-gray-600"
                                                        type="text">

                                                </div>
                                            </div>

                                            <div class="flex flex-wrap -mx-3 mb-6">
                                                <div class="w-full px-3">
                                                    <label for="name"
                                                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                                       Correo
                                                    </label>
                                                    <input hidden name="email" id="email" required value="{{$user->email}}"
                                                        class="px-4 py-2 border focus:ring-gray-500 w-full sm:text-sm border-blue-500 rounded-md focus:outline-none text-gray-600"
                                                        type="text">

                                                </div>
                                            </div>

                                            <div class="flex flex-wrap -mx-3 mb-6">
                                                <div class="w-full px-3">
                                                    <label for="message"
                                                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                                        Mensaje
                                                    </label>
                                                    <textarea name="msg" id="msg" required
                                                        class=" no-resize appearance-none block w-full text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none h-48 resize-none"
                                                        id="message"></textarea>

                                                </div>
                                            </div>
                                            <div class="md:flex md:items-center">
                                                <div class="md:w-1/3">
                                                    <input type="submit" value="Send"
                                                        class="flex ml-auto text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded">


                                                </div>
                                                <div class="md:w-2/3"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
