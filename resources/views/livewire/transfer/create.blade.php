<div>
    <livewire:navigation.user-navigation />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="py-12">
        <div class="flex items-center justify-center max-w-5xl mx-auto sm:px-6 lg:px-8">
            <form wire:submit.prevent="submit" class="w-full flex items-center justify-center">
                <div class="flex w-full max-w-lg flex-col gap-4 overflow-hidden rounded-xl border border-gray-200 bg-white shadow-xl dark:border-gray-700 dark:bg-gray-900">
                    <div class="flex items-center justify-between border-b border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                            Transferir valor para:
                        </h3>
                    </div>

                    <div class="space-x-6 px-6 py-6 space-y-5">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome do destinatario</label>
                            <input wire:model="name" type="text" id="name" placeholder="Nome do destinatário"
                                class="mt-1 w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm shadow-sm focus:border-primary focus:ring focus:ring-primary/30 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-100">

                            <div class="mt-2 text-red-500 text-sm">
                                @error('name') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">E-mail</label>
                            <input wire:model="email" type="email" id="email" placeholder="exemplo@email.com"
                                class="mt-1 w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm shadow-sm focus:border-primary focus:ring focus:ring-primary/30 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-100">

                            <div class="mt-2 text-red-500 text-sm">
                                @error('email') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div>
                            <label for="value" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Valor</label>
                            <input wire:model="value" type="number" id="value" step="0.01" placeholder="R$ 0,00"
                                class="mt-1 w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm shadow-sm focus:border-primary focus:ring focus:ring-primary/30 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-100">

                            <div class="mt-2 text-red-500 text-sm">
                                @error('value') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col-reverse gap-2 border-t border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800 sm:flex-row sm:justify-end">
                        <a href="{{ route('index-user') }}"
                                class="rounded-lg px-4 py-2 text-sm font-medium text-gray-600 transition hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">
                            Voltar
                        </a>

                        <button
                                class="rounded-lg bg-primary px-4 py-2 text-sm font-medium text-white transition hover:bg-primary/90 focus:ring-2 focus:ring-primary/50 dark:bg-primary-dark">
                            Salvar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
