<x-app-layout>
    <livewire:navigation.user-navigation />

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between items-center p-6 text-gray-900">
                    <div>
                        <h3 class="font-semibold text-gray-500 pt-3">Bem vindo,</h3>
                        <p class="text-xl font-bold first-letter:uppercase">{{ Auth::user()->name }}</p>  <br>
                    </div>

                    <div>
                        <h3 class="text-xl text-center font-semibold mb-1">Saldo atual</h3>

                        <p class="text-center font-semibold text-green-500">R$ 1,234.56</p>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold mb-1">Ações</h3>
                        <div class="flex justify-center gap-3">
                            <div x-data="{modalIsOpen: false}">
                                <button x-on:click="modalIsOpen = true" type="button" class="text-gray-600 hover:text-gray-500 duration-300 w-6 h-6">
                                    <x-svg.moneybag-edit />
                                </button>

                                <div x-cloak
                                    x-show="modalIsOpen"
                                    x-transition.opacity.duration.200ms
                                    x-trap.inert.noscroll="modalIsOpen"
                                    x-on:keydown.esc.window="modalIsOpen = false"
                                    x-on:click.self="modalIsOpen = false"
                                    class="fixed inset-0 z-30 flex items-end justify-center bg-black/50 p-4 pb-8 backdrop-blur-sm sm:items-center lg:p-8"
                                    role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">

                                    <!-- Modal Dialog -->
                                    <div x-show="modalIsOpen"
                                        x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
                                        x-transition:enter-start="scale-90 opacity-0"
                                        x-transition:enter-end="scale-100 opacity-100"
                                        class="flex w-full max-w-lg flex-col gap-4 overflow-hidden rounded-xl border border-gray-200 bg-white shadow-xl dark:border-gray-700 dark:bg-gray-900">

                                        <!-- Dialog Header -->
                                        <div class="flex items-center justify-between border-b border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800">
                                            <h3 id="defaultModalTitle" class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                                Editar saldo
                                            </h3>
                                            <button x-on:click="modalIsOpen = false" aria-label="Fechar modal" class="text-gray-500 hover:text-gray-800 dark:hover:text-gray-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                                </svg>
                                            </button>
                                        </div>

                                        <!-- Dialog Body -->
                                        <div class="px-6 py-6 space-y-4">
                                            <div>
                                                <label for="valor" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Valor atual</label>
                                                <input type="number" id="valor" name="valor" step="0.01" placeholder="R$ 0,00"
                                                    class="mt-1 w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm shadow-sm focus:border-primary focus:ring focus:ring-primary/30 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-100">
                                            </div>
                                        </div>

                                        <!-- Dialog Footer -->
                                        <div class="flex flex-col-reverse gap-2 border-t border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800 sm:flex-row sm:justify-end">
                                            <button x-on:click="modalIsOpen = false" type="button"
                                                    class="rounded-lg px-4 py-2 text-sm font-medium text-gray-600 transition hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">
                                                Cancelar
                                            </button>
                                            <button type="button"
                                                    class="rounded-lg bg-primary px-4 py-2 text-sm font-medium text-white transition hover:bg-primary/90 focus:ring-2 focus:ring-primary/50 dark:bg-primary-dark">
                                                Salvar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div x-data="{modalIsOpen: false}">
                                <button x-on:click="modalIsOpen = true" type="button" class="text-green-600 hover:text-green-500 duration-300 w-6 h-6">
                                    <x-svg.moneybag-plus />
                                </button>

                                <div x-cloak
                                    x-show="modalIsOpen"
                                    x-transition.opacity.duration.200ms
                                    x-trap.inert.noscroll="modalIsOpen"
                                    x-on:keydown.esc.window="modalIsOpen = false"
                                    x-on:click.self="modalIsOpen = false"
                                    class="fixed inset-0 z-30 flex items-end justify-center bg-black/50 p-4 pb-8 backdrop-blur-sm sm:items-center lg:p-8"
                                    role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">

                                    <!-- Modal Dialog -->
                                    <div x-show="modalIsOpen"
                                        x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
                                        x-transition:enter-start="scale-90 opacity-0"
                                        x-transition:enter-end="scale-100 opacity-100"
                                        class="flex w-full max-w-lg flex-col gap-4 overflow-hidden rounded-xl border border-gray-200 bg-white shadow-xl dark:border-gray-700 dark:bg-gray-900">

                                        <!-- Dialog Header -->
                                        <div class="flex items-center justify-between border-b border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800">
                                            <h3 id="defaultModalTitle" class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                                Adicionar saldo
                                            </h3>
                                            <button x-on:click="modalIsOpen = false" aria-label="Fechar modal" class="text-gray-500 hover:text-gray-800 dark:hover:text-gray-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                                </svg>
                                            </button>
                                        </div>

                                        <!-- Dialog Body -->
                                        <div class="px-6 py-6 space-y-4">
                                            <div>
                                                <label for="valor" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Valor</label>
                                                <input type="number" id="valor" name="valor" step="0.01" placeholder="R$ 0,00"
                                                    class="mt-1 w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm shadow-sm focus:border-primary focus:ring focus:ring-primary/30 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-100">
                                            </div>
                                        </div>

                                        <!-- Dialog Footer -->
                                        <div class="flex flex-col-reverse gap-2 border-t border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800 sm:flex-row sm:justify-end">
                                            <button x-on:click="modalIsOpen = false" type="button"
                                                    class="rounded-lg px-4 py-2 text-sm font-medium text-gray-600 transition hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">
                                                Cancelar
                                            </button>
                                            <button type="button"
                                                    class="rounded-lg bg-primary px-4 py-2 text-sm font-medium text-white transition hover:bg-primary/90 focus:ring-2 focus:ring-primary/50 dark:bg-primary-dark">
                                                Salvar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 mt-10">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
               <div class="flex justify-between items-center p-6 text-gray-900">
                    <div>
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-300 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nome..." required />
                        </div>
                    </div>

                    <div x-data="{modalIsOpen: false}">
                        <button x-on:click="modalIsOpen = true" type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                            Nova Transfência
                        </button>

                        <div x-cloak
                            x-show="modalIsOpen"
                            x-transition.opacity.duration.200ms
                            x-trap.inert.noscroll="modalIsOpen"
                            x-on:keydown.esc.window="modalIsOpen = false"
                            x-on:click.self="modalIsOpen = false"
                            class="fixed inset-0 z-30 flex items-end justify-center bg-black/50 p-4 pb-8 backdrop-blur-sm sm:items-center lg:p-8"
                            role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">

                            <!-- Modal Dialog -->
                            <div x-show="modalIsOpen"
                                x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
                                x-transition:enter-start="scale-90 opacity-0"
                                x-transition:enter-end="scale-100 opacity-100"
                                class="flex w-full max-w-lg flex-col gap-4 overflow-hidden rounded-xl border border-gray-200 bg-white shadow-xl dark:border-gray-700 dark:bg-gray-900">

                                <!-- Dialog Header -->
                                <div class="flex items-center justify-between border-b border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800">
                                    <h3 id="defaultModalTitle" class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                        Enviar Dinheiro
                                    </h3>
                                    <button x-on:click="modalIsOpen = false" aria-label="Fechar modal" class="text-gray-500 hover:text-gray-800 dark:hover:text-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>

                                <!-- Dialog Body -->
                                <div class="px-6 py-6 space-y-4">
                                    <div>
                                        <label for="nome" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome</label>
                                        <input type="text" id="nome" name="nome" placeholder="Nome do destinatário"
                                            class="mt-1 w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm shadow-sm focus:border-primary focus:ring focus:ring-primary/30 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-100">
                                    </div>
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">E-mail</label>
                                        <input type="email" id="email" name="email" placeholder="exemplo@email.com"
                                            class="mt-1 w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm shadow-sm focus:border-primary focus:ring focus:ring-primary/30 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-100">
                                    </div>
                                    <div>
                                        <label for="valor" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Valor</label>
                                        <input type="number" id="valor" name="valor" step="0.01" placeholder="R$ 0,00"
                                            class="mt-1 w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm shadow-sm focus:border-primary focus:ring focus:ring-primary/30 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-100">
                                    </div>
                                </div>

                                <!-- Dialog Footer -->
                                <div class="flex flex-col-reverse gap-2 border-t border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800 sm:flex-row sm:justify-end">
                                    <button x-on:click="modalIsOpen = false" type="button"
                                            class="rounded-lg px-4 py-2 text-sm font-medium text-gray-600 transition hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">
                                        Cancelar
                                    </button>
                                    <button type="button"
                                            class="rounded-lg bg-primary px-4 py-2 text-sm font-medium text-white transition hover:bg-primary/90 focus:ring-2 focus:ring-primary/50 dark:bg-primary-dark">
                                        Enviar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>

               <hr class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded-sm md:my-10 dark:bg-gray-700">

                <h3 class="text-xl font-semibold mb-1 p-6 text-gray-900">Últimas Transferências</h3>

                <div class="mb-1 p-6 space-y-4 overflow-auto max-h-96">
                    <ul class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <li class="pb-3 sm:pb-4">
                            <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                <div class="shrink-0">
                                    <img class="w-8 h-8 rounded-full" src="{{ asset('images/user.png') }}" alt="Neil image">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">
                                    Neil Sims
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    email@flowbite.com
                                    </p>
                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                    $320
                                </div>
                            </div>
                        </li>
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                <div class="shrink-0">
                                    <img class="w-8 h-8 rounded-full" src="{{ asset('images/user.png') }}" alt="Neil image">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">
                                    Neil Sims
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    email@flowbite.com
                                    </p>
                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                    $320
                                </div>
                            </div>
                        </li>
                        <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4 rtl:space-x-reverse">
                            <div class="shrink-0">
                                <img class="w-8 h-8 rounded-full" src="{{ asset('images/user.png') }}" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">
                                Neil Sims
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                email@flowbite.com
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                $320
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4 rtl:space-x-reverse">
                            <div class="shrink-0">
                                <img class="w-8 h-8 rounded-full" src="{{ asset('images/user.png') }}" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">
                                Neil Sims
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                email@flowbite.com
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                $320
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4 rtl:space-x-reverse">
                            <div class="shrink-0">
                                <img class="w-8 h-8 rounded-full" src="{{ asset('images/user.png') }}" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">
                                Neil Sims
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                email@flowbite.com
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                $320
                            </div>
                        </div>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
