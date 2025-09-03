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
                            <button class="text-gray-600 hover:text-gray-500 duration-300 w-6 h-6">
                                <x-svg.moneybag-edit />
                            </button>

                            <button class="text-green-600 hover:text-green-500 duration-300 w-6 h-6">
                                <x-svg.moneybag-plus />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


