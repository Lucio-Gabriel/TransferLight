<x-app-layout>
    <livewire:navigation.shopkeeper-navigation />

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between items-center p-6 text-gray-900">
                    <div class="ml-10">
                        <h3 class="font-semibold text-gray-500 pt-3">Bem vindo,</h3>
                        <p class="text-xl font-bold first-letter:uppercase">{{ Auth::user()->name }}</p>  <br>
                    </div>

                    <div class="mr-10">
                        <h3 class="text-xl text-center font-semibold mb-1">Total Recebido</h3>

                        <p class="text-center font-semibold text-green-500">
                            R$ {{ number_format($this->shopkeeperBalance->balance, 2, ',', '.') }}
                        </p>
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
                </div>

                <h3 class="text-xl font-semibold mb-1 p-6 text-gray-900">Últimas Transações Recebidas</h3>

                <div class="overflow-auto max-h-96">
                    @foreach ($this->transfersReceived as $transfer)
                        <div class="mb-1 p-6 space-y-4 overflow-auto max-h-96">
                            <ul class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <li class="pb-3 sm:pb-4">
                                    <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                        <div class="shrink-0">
                                            <img class="w-8 h-8 rounded-full" src="{{ asset('images/user.png') }}" alt="Neil image">
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900 truncate">
                                                {{ $transfer->user->name }}
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                {{ $transfer->user->email }}
                                            </p>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900 truncate">
                                                Recebido em:
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400 ml-1">
                                                {{ $transfer->created_at->format('d/m/Y') }}
                                            </p>
                                        </div>
                                        <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                            $ {{ number_format($transfer->value, 2, ',', '.') }}
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
