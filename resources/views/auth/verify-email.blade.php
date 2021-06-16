<x-app-layout title="CRM | Verificar Email">

    <div class="p-4">
        <div class="w-full overflow-hidden rounded-lg">
            <div
                class="w-full overflow-x-auto font-semibold tracking-wide text-left bg-white rounded-md dark:bg-darker mt-4 mb-4">
                {{--  --}}


                <!-- component -->
                <div class="p-10 flex items-center justify-center">
                    <div
                        class="bg-white dark:bg-gray-800 border-gray-700 dark:border-gray-800 p-4 rounded-xl border max-w-xl  dark:bg-darker">
                        <div class="flex justify-between">
                            <div class="flex items-center">
                                <img class="h-11 w-11 rounded-full"
                                    src="https://pbs.twimg.com/profile_images/1287562748562309122/4RLk5A_U_x96.jpg" />
                                <div class="ml-1.5 text-sm leading-tight">
                                    <span class="text-black dark:text-white font-bold block ">Administrador</span>
                                    <span
                                        class="text-gray-500 dark:text-gray-400 font-normal block">@Administrador</span>
                                </div>
                            </div>
                            <svg class="text-blue-400 dark:text-white h-6 w-auto inline-block fill-current"
                                viewBox="0 0 24 24">
                                <g>
                                    <path
                                        d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z">
                                    </path>
                                </g>
                            </svg>
                        </div>
                        <p class="text-black block text-xl leading-snug mt-3 font-medium tracking-wider dark:text-primary-light">
                            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                        </p>
                        <img class="mt-2 rounded-2xl border border-gray-100 dark:border-gray-700"
                            src="https://res.cloudinary.com/hfakqpuzy/image/upload/v1620422181/pete-pedroza-VyC0YSFRDTU-unsplash_htfbge.jpg" />
                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                            </div>
                        @endif

                        <div class="mt-4 flex items-center justify-between">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf

                                <div>
                                    <button type="submit"
                                        class="flex items-center justify-center w-full px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary-dark focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark">
                                        {{ __('Resend Verification Email') }}
                                    </button>
                                </div>
                            </form>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white text-sm px-4 py-2  border rounded-full">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </div>






                        <div class="border-gray-200 dark:border-gray-600 border border-b-0 my-1"></div>

                    </div>

                    {{--  --}}

                </div>
            </div>
        </div>

        {{--  --}}


</x-app-layout>
