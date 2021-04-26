<x-app2-layout>
    <style>@import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);</style>
    <style>
        /*
        module.exports = {
            plugins: [require('@tailwindcss/forms'),]
        };
        */
        .form-radio {
        -webkit-appearance: none;
            -moz-appearance: none;
                appearance: none;
        -webkit-print-color-adjust: exact;
                color-adjust: exact;
        display: inline-block;
        vertical-align: middle;
        background-origin: border-box;
        -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
                user-select: none;
        flex-shrink: 0;
        border-radius: 100%;
        border-width: 2px;
        }

        .form-radio:checked {
        background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
        border-color: transparent;
        background-color: currentColor;
        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;
        }

        @media not print {
        .form-radio::-ms-check {
            border-width: 1px;
            color: transparent;
            background: inherit;
            border-color: inherit;
            border-radius: inherit;
        }
        }

        .form-radio:focus {
        outline: none;
        }

        .form-select {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23a0aec0'%3e%3cpath d='M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z'/%3e%3c/svg%3e");
        -webkit-appearance: none;
            -moz-appearance: none;
                appearance: none;
        -webkit-print-color-adjust: exact;
                color-adjust: exact;
        background-repeat: no-repeat;
        padding-top: 0.5rem;
        padding-right: 2.5rem;
        padding-bottom: 0.5rem;
        padding-left: 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        background-position: right 0.5rem center;
        background-size: 1.5em 1.5em;
        }

        .form-select::-ms-expand {
        color: #a0aec0;
        border: none;
        }

        @media not print {
        .form-select::-ms-expand {
            display: none;
        }
        }

        @media print and (-ms-high-contrast: active), print and (-ms-high-contrast: none) {
        .form-select {
            padding-right: 0.75rem;
        }
        }
    </style>
    <div class="container mx-auto px-6">
        <h3 class="text-gray-700 text-2xl font-medium">Checkout</h3>
        <div class="flex flex-col lg:flex-row mt-8">
            <div class="w-full lg:w-1/2 order-2">
                <div class="flex items-center">

                    <button class="flex text-sm text-blue-500 focus:outline-none"><span
                            class="flex items-center justify-center text-white bg-blue-500 rounded-full h-5 w-5 mr-2">2</span>
                        Shipping</button>
                    <button class="flex text-sm text-gray-700 ml-8 focus:outline-none"><span
                            class="flex items-center justify-center border-2 border-blue-500 rounded-full h-5 w-5 mr-2">3</span>
                        Payments</button>
                </div>
                <form id="form-checkout" action="{{ route('confirm') }}" method="POST" >
                    @csrf
                    <div class="mt-8">
                        <div class="grid-cols-2">
                            <h4 class="text-sm text-gray-500 font-medium">Datos de pago</h4>
                            <div class="min-w-screen min-h-screen bg-white flex items-center justify-center px-5 pb-10 pt-16">
                                <div class="w-full mx-auto rounded-lg bg-white shadow-lg p-5 text-gray-700" style="max-width: 600px">
                                    <div class="w-full pt-1 pb-5">
                                        <div class="bg-blue-600 text-white overflow-hidden rounded-full w-20 h-20 -mt-16 mx-auto shadow-lg flex justify-center items-center">
                                            <i class="mdi mdi-credit-card-outline text-3xl"></i>
                                        </div>
                                    </div>
                                    <div class="mb-10">
                                        <h1 class="text-center font-bold text-xl uppercase">Datos Pago</h1>
                                    </div>
                                    <div class="mb-3 flex -mx-2">
                                        <div class="px-2">
                                            <label for="type1" class="flex items-center cursor-pointer">
                                                <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png" class="h-8 ml-3">
                                            </label>
                                        </div>
                                        <!--<div class="px-2">
                                            <label for="type2" class="flex items-center cursor-pointer">
                                                <input type="radio" class="form-radio h-5 w-5 bg-blue-600" name="type" id="type2">
                                                <img src="https://www.sketchappsources.com/resources/source-image/PayPalCard.png" class="h-8 ml-3">
                                            </label>
                                        </div>-->
                                    </div>

                                    <div class="mb-3">
                                        <label class="font-bold text-sm mb-2 ml-1">Número de tarjeta</label>
                                        <div>
                                            <input class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" type="text" name="cardNumber" id="form-checkout__cardNumber" />
                                        </div>
                                    </div>

                                    <div class="mb-3 -mx-2 flex items-end">
                                        <div class="px-2 w-1/2">
                                            <label class="font-bold text-sm mb-2 ml-1">CVV</label>
                                            <div>
                                                <input class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" type="text" name="securityCode" id="form-checkout__securityCode" />
                                            </div>
                                        </div>

                                        <div class="px-2 w-1/2">
                                            <label class="font-bold text-sm mb-2 ml-1">Provedor de Red</label>
                                            <div>
                                                <select class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer" name="issuer" id="form-checkout__issuer"></select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 -mx-2 flex items-end">
                                        <div class="px-2 w-1/2">
                                            <label class="font-bold text-sm mb-2 ml-1">Mes de expiración</label>
                                            <div>
                                                <input class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer" type="text" name="cardExpirationMonth" id="form-checkout__cardExpirationMonth" />
                                            </div>
                                        </div>

                                        <div class="px-2 w-1/2">
                                            <label class="font-bold text-sm mb-2 ml-1">Año de Expiración</label>
                                            <div>
                                                <input class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer" type="text" name="cardExpirationYear" id="form-checkout__cardExpirationYear" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="font-bold text-sm mb-2 ml-1">Titular de la tarjeta</label>
                                        <div>
                                            <input class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" type="text" name="cardholderName" id="form-checkout__cardholderName"/>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="font-bold text-sm mb-2 ml-1">Correo Electronico</label>
                                        <div>
                                            <input class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" type="email" name="cardholderEmail" id="form-checkout__cardholderEmail"/>
                                        </div>
                                    </div>

                                    <div class="px-2">
                                        <label class="font-bold text-sm mb-2 ml-1">Cuotas</label>
                                        <select class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer" name="installments" id="form-checkout__installments"></select>
                                    </div>
                                    <div>
                                        <progress value="0" class="progress-bar">loading...</progress>
                                        <button class="block w-full max-w-xs mx-auto bg-blue-600  text-white rounded-lg px-3 py-3 font-semibold" type="submit" id="form-checkout__submit"><i class="mdi mdi-lock-outline mr-1"></i> PAGAR</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @foreach ($ShoppingCart as $item)
            <div class="w-full mb-8 flex-shrink-0 order-1 lg:w-1/2 lg:mb-0 lg:order-2">
                <div class="flex justify-center lg:justify-end">
                    <div class="border rounded-md max-w-md w-full px-4 py-3">
                        <div class="flex items-center justify-between">
                            <h3 class="text-gray-700 font-medium">Order total (2)</h3>
                            <span class="text-gray-600 text-sm">Edit</span>
                        </div>
                        <div class="flex justify-between mt-6">
                            <div class="flex">
                                <img class="h-20 w-20 object-cover rounded"
                                    src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80"
                                    alt="">
                                <div class="mx-3">
                                    <h3 class="text-sm text-gray-600">{{ $item->products->name }}</h3>
                                    <div class="flex items-center mt-2">
                                        <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                                <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z">
                                                </path>
                                            </svg>
                                        </button>
                                        <span class="text-gray-700 mx-2">{{ $item->sum }}</span>
                                        <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                                <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <span class="text-gray-600">${{ $item->products->inventories['0']->sale_price }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @section('javascript')
        <script src="https://sdk.mercadopago.com/js/v2"></script>

        <script>
            const mp = new MercadoPago("{{ config('mercadopago.test.public_key') }}", {
                locale: 'es-MX'
            });

            const cardForm = mp.cardForm({
                amount: '100.5',
                autoMount: true,
                processingMode: 'aggregator',
                form: {
                    id: 'form-checkout',
                    cardholderName: {
                        id: 'form-checkout__cardholderName',
                        placeholder: 'Titular Tarjeta',
                    },

                    cardholderEmail: {
                        id: 'form-checkout__cardholderEmail',
                        placeholder: 'Email',
                    },

                    cardNumber: {
                        id: 'form-checkout__cardNumber',
                        placeholder: 'Número Tarjeta',
                    },

                    cardExpirationMonth: {
                        id: 'form-checkout__cardExpirationMonth',
                        placeholder: 'MM'
                    },

                    cardExpirationYear: {
                        id: 'form-checkout__cardExpirationYear',
                        placeholder: 'YY'
                    },

                    securityCode: {
                        id: 'form-checkout__securityCode',
                        placeholder: 'CVV',
                    },

                    installments: {
                        id: 'form-checkout__installments',
                        placeholder: 'Total Cuotas'
                    },
                    
                    issuer: {
                        id: 'form-checkout__issuer',
                        placeholder: 'Red'
                    }
                },
                callbacks: {
                    onFormMounted: error => {
                        if (error) return console.warn('Form Mounted handling error: ', error)
                        console.log('Form mounted')
                    },

                    onFormUnmounted: error => {
                        if (error) return console.warn('Form Unmounted handling error: ', error)
                        console.log('Form unmounted')
                    },

                    onIdentificationTypesReceived: (error, identificationTypes) => {
                        if (error) return console.warn('identificationTypes handling error: ', error)
                        console.log('Identification types available: ', identificationTypes)
                    },

                    onPaymentMethodsReceived: (error, paymentMethods) => {
                        if (error) return console.warn('paymentMethods handling error: ', error)
                        console.log('Payment Methods available: ', paymentMethods)
                    },

                    onIssuersReceived: (error, issuers) => {
                        if (error) return console.warn('issuers handling error: ', error)
                        console.log('Issuers available: ', issuers)
                    },

                    onInstallmentsReceived: (error, installments) => {
                        if (error) return console.warn('installments handling error: ', error)
                        console.log('Installments available: ', installments)
                    },

                    onCardTokenReceived: (error, token) => {
                        if (error) return console.warn('Token handling error: ', error)
                        console.log('Token available: ', token)
                    },

                    onSubmit: (event) => {
                        event.preventDefault();
                        const cardData = cardForm.getCardFormData();
                        console.log('CardForm data available: ', cardData)

                        var form = document.getElementById('form-checkout');
                        form.submit();
                    },

                    onFetching:(resource) => {
                        console.log('Fetching resource: ', resource)

                        // Animate progress bar
                        const progressBar = document.querySelector('.progress-bar')
                        progressBar.removeAttribute('value')

                        return () => {
                            progressBar.setAttribute('value', '0')
                        }
                    },
                }
            })
        </script>
    @endsection
</x-app2-layout>
