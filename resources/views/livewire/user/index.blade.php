<x-app-layout>
    <livewire:navigation.user-navigation />

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between items-center p-6 text-gray-900">
                    <div>
                        <h3 class="font-semibold text-gray-500 pt-3">Bem vindo,</h3>
                        <p class="text-xl font-bold first-letter:uppercase">{{ Auth::user()->name }}</p><br>
                    </div>
                        <p class="text-center font-semibold text-green-500">
                            R$ {{ number_format($this->userBalance->balance, 2, ',', '.') }}
                        </p>

                     <div>
                        <h3 class="text-xl font-semibold mb-1">Ações</h3>
                        <div class="ml-4">
                            <a href="{{ route('create.balance') }}" class="text-green-600 hover:text-green-500 duration-300 w-6 h-6">
                                <x-svg.moneybag-plus class="w-6 h-6" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 mt-10">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between items-center p-6 text-gray-900">
                    <div>
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    </div>

                    <div>
                        <a href="{{ route('create.transfer') }}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                            Nova Transfência
                        </a>
                    </div>
                </div>

                <hr class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded-sm md:my-10 dark:bg-gray-700">

                <h3 class="text-xl font-semibold mb-1 p-6 text-gray-900">Transferências Realizadas:</h3>

                <div class="overflow-auto max-h-96">
                    @foreach ($this->transfers as $transfert)
                        <div class="mb-1 p-6 space-y-4 overflow-auto max-h-96">
                            <ul class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <li class="pb-3 sm:pb-4">
                                    <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                        <div class="shrink-0">
                                            <img class="w-8 h-8 rounded-full" src="{{ asset('images/user.png') }}" alt="Neil image">
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900 truncate">
                                                {{ $transfert->name }}
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                {{ $transfert->email }}
                                            </p>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900 truncate">Data da transferência</p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400 ml-7">
                                                {{ $transfert->created_at->format('d/m/Y') }}
                                            </p>
                                        </div>
                                        <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                            R$ {{ number_format($transfert->value, 2, ',', '.') }}
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
