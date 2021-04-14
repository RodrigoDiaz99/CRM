<header class="relative bg-white dark:bg-darker">
    <div class="flex items-center justify-between p-2 border-b dark:border-primary-darker">
        <!-- Mobile menu button -->
        <button @click="isMobileMainMenuOpen = !isMobileMainMenuOpen"
            class="p-1 transition-colors duration-200 rounded-md text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark md:hidden focus:outline-none focus:ring">
            <span class="sr-only">Abrir menú</span>
            <span aria-hidden="true">
                <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </span>
        </button>

        <!-- Brand -->
        <a href="/dashboard"
            class="inline-block text-2xl font-bold tracking-wider uppercase text-primary-dark dark:text-light">
            CRM
        </a>

        <!-- Mobile sub menu button -->


        <!-- Desktop Right buttons -->
        @include('layouts.nav')

        <!-- navbar Mobile-->
        @include('layouts.nav-mobile')
    </div>
    <!-- Mobile main manu -->
    @include('layouts.side-mobile')

</header>
