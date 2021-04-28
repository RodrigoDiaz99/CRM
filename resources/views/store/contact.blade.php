<x-app2-layout>

    <div class="p-4">
        <div class="w-full overflow-hidden rounded-lg">
            <div class="relative py-3 sm:max-w-xl sm:mx-auto ">

                <div
                    class="relative px-4 py-10 bg-white text-center dark:bg-darker mb-4 mx-8 md:mx-0 shadow rounded-3xl sm:p-10">

                    <div class="space-y-4 ...">
                        <div class="max-w-md mx-auto">
                            <form action="{{ route('contact_send') }}" class="w-full max-w-lg" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full px-3">
                                        <label for="name"
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                            Nombre
                                        </label>
                                        <input name="name" d="name" required
                                            class="px-4 py-2 border focus:ring-gray-500 w-full sm:text-sm border-blue-500 rounded-md focus:outline-none text-gray-600"
                                            type="text">

                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full px-3">
                                        <label for="email "
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                            E-mail
                                        </label>
                                        <input type="email"
                                            class="px-4 py-2 border focus:ring-gray-500 w-full sm:text-sm border-blue-500 rounded-md focus:outline-none text-gray-600"
                                            id="email" name="email" required>

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
                                            class="flex ml-auto text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded"
                                           >


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
</x-app2-layout>
