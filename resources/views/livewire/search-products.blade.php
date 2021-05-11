<div class="relative mt-6 max-w-lg mx-auto">
    <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
        <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
            <path
                d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </span>

    <div style="position:relative" x-data="inputSearch()">
        <!-- Campo de búsqueda -->
        <input 
            type="text" 
            x-on:keydown="iconReset = true" 
            class="w-full border rounded-md pl-10 pr-4 py-2 focus:border-blue-500 focus:outline-none focus:shadow-outline"
            wire:model="search" 
            placeholder="Introduzca el término a buscar..."
        >
        <!-- Icono para borrar el campo de búsqueda (ajústalo con tu css) -->
        <div style="position: absolute" x-show="iconReset">
            <svg 
                class="h-5 w-5 mt-1 cursor-pointer" 
                x-on:click="iconReset = false" 
                wire:click="clearSearch" 
                xmlns="http://www.w3.org/2000/svg" 
                fill="none" 
                viewBox="0 0 24 24" 
                stroke="currentColor"
            >
                <path 
                    stroke-linecap="round" 
                    stroke-linejoin="round" 
                    stroke-width="2" 
                    d="M6 18L18 6M6 6l12 12"
                >
                </path>
            </svg>
        </div>
    </div>
    <!-- Resultados -->
    @isset($producs)
        <ul>
            @foreach($producs as $item)
                <li>
                    {{ $item->name }}
                </li>
            @endforeach
        </ul>
    @endisset
</div>

@push('javascript')
    <script>
        function inputSearch() {
            return {
                iconReset: false,
                search: '',
            }
        }
    </script>
@endpush