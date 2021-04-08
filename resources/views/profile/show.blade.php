<x-app-layout title="Perfil">
    <div class="container grid px-6 mx-auto ">

        <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
            @livewire('profile.update-profile-information-form')
        </div>

        <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Components"">
            <h4 class=" block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400
            dark:hover:text-light hover:text-gray-700">
            {{ __('Actualizar Contraseña') }}
            </h4>

            @livewire('profile.update-password-form')
        </div>

        @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())


            <div class="mt-10 sm:mt-0">
                <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                    {{ __('Autentificador de dos factores') }}
                </h4>

                @livewire('profile.two-factor-authentication-form')
            </div>
        @endif

        <div class="mt-10 sm:mt-0">
            <h4 class="mb-4 text-lg font-semibold text-white dark:text-gray-300">
                {{ __('Sesiones en Navegadores') }}
            </h4>

            @livewire('profile.logout-other-browser-sessions-form')
        </div>

        <div class="mt-10 sm:mt-0">
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                {{ __('Borrar Cuenta') }}
            </h4>

            @livewire('profile.delete-user-form')
        </div>

    </div>
</x-app-layout>
