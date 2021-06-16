<x-app-layout>
    <!-- Content header -->
    <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
        <h1 class="text-2xl font-semibold">Dashboard</h1>
    </div>
    <!-- Content -->
    <div class="mt-2">
        <!-- State cards -->
        <div class="grid grid-cols-1 gap-8 p-4 lg:grid-cols-2 xl:grid-cols-4">
            <!-- Value card -->
            @role('Admin')
            <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                <div>
                    <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        Ventas
                    </h6>
                    <span class="text-xl font-semibold">${{ $sale }}</span>
                </div>
                <div>
                    <span>
                        <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </span>
                </div>
            </div>
            <!-- Users card -->
            <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                <div>
                    <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        Usuarios
                    </h6>
                    <span class="text-xl font-semibold">{{ $users_count }}</span>
                </div>
                <div>
                    <span>
                        <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        </svg>
                    </span>
                </div>
            </div>
            <!-- Orders card -->
            <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                <div>
                    <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        Pedidos
                    </h6>
                    <span class="text-xl font-semibold">{{ $sales_count }}</span>
                </div>
                <div>
                    <span>
                        <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </span>
                </div>
            </div>
            <!-- Tickets card -->
            <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                <div>
                    <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        Reportes
                    </h6>
                    <span class="text-xl font-semibold">{{ $reports }}</span>
                </div>
                <div>
                    <span>
                        <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                        </svg>
                    </span>
                </div>
            </div>
        </div>
        <!-- Charts -->
        <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-3">
            <!-- Bar chart card -->
            <div class="col-span-2 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
                <!-- Card header -->
                <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                    <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Total de ventas del mes</h4>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-500 dark:text-light">Last year</span>
                    </div>
                </div>
                <!-- Chart -->
                <div class="relative p-4 h-72">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
            <!-- Doughnut chart card -->
            <div class="bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
                <!-- Card header -->
                <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                    <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Top clientes del mes</h4>
                    <div class="flex items-center">
                        <button class="relative focus:outline-none" x-cloak @click="isOn = !isOn; $parent.updateDoughnutChart(isOn)">
                            <div class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-darker">
                            </div>
                            <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm" :class="{ 'translate-x-0  bg-white dark:bg-primary-100': !isOn, 'translate-x-6 bg-primary-light dark:bg-primary': isOn }">
                            </div>
                        </button>
                    </div>
                </div>
                <!-- Chart -->
                <div class="relative p-4 h-72">
                    <canvas id="doughnutChart2"></canvas>
                </div>
            </div>

         
            <!-- Doughnut chart card -->
            <div class="bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
                <!-- Card header -->
                <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                    <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Top productos vendidos del mes</h4>
                    <div class="flex items-center">
                        <button class="relative focus:outline-none" x-cloak @click="isOn = !isOn; $parent.updateDoughnutChart(isOn)">
                            <div class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-darker">
                            </div>
                            <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm" :class="{ 'translate-x-0  bg-white dark:bg-primary-100': !isOn, 'translate-x-6 bg-primary-light dark:bg-primary': isOn }">
                            </div>
                        </button>
                    </div>
                </div>
                <!-- Chart -->
                <div class="relative p-4 h-72">
                    <canvas id="doughnutChart"></canvas>
                </div>
            </div>
        </div>

        @endrole
    </div>
    </div>
    @role('Client')
    <div class="p-4">
        <div class="w-full overflow-hidden rounded-lg">
            <div class="w-full overflow-x-auto font-semibold tracking-wide text-left dark:border-gray-700 bg-white rounded-md dark:bg-darker mt-4 mb-4">
                <div class="flex items-center justify-center p-4 bg-white rounded-md dark:bg-darker">
                    <div class="p-12 text-center max-w-2xl">
                        <div class="md:text-3xl text-3xl font-bold text-gray-500 uppercase dark:text-primary-light">Bienvenido {{auth()->user()->first_name}}</div>
                        <div class="text-xl font-normal mt-4">Gracias por estar con nosotros
                        </div>
                        <div class="mt-6 flex justify-center h-12 relative">
                            <div class="flex shadow-md font-medium absolute py-2 px-4
                cursor-pointer bg-green-600 text-lg tr-mt svelte-jqwywd text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary-dark focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark">
                                Tienda</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endrole
</x-app-layout>