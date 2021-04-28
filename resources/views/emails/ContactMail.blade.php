
<x-guest-layout title="Prolifearmy | Registro">
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                <div class="text-center my-3">
                <h1 class="text-4xl">Correo de contacto</h1>
                <p>Nombre: {{$details['name']}}</p>
                <p>Email: {{$details['email']}}</p>
                <p>Mensaje: {{$details['msg']}}</p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>