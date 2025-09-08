<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TransferLight</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans">
        <div class="min-h-screen h-full flex flex-col bg-gradient-to-br from-gray-50 to-gray-100">
            <header class="w-full px-4 sm:px-10 py-6">
                <div class="max-w-7xl lg:max-w-7xl mx-auto flex justify-between items-center">
                    <div class="flex items-center space-x-2">
                        <span class="text-2xl font-bold text-primary">
                            TransferLight
                        </span>
                    </div>
                    <nav class="md:flex space-x-4">
                        <a href="{{ route('login') }}"
                            class="text-gray-600 hover:text-secondary transition-colors">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="text-gray-600 hover:text-secondary transition-colors">
                            Register
                        </a>
                    </nav>
                </div>
            </header>

            <div class="flex justify-center items-center mt-44">
                <div class="space-y-6 text-center">
                    <h1 class="text-xl md:text-3xl font-bold text-gray-900 leading-tight">
                        TransferLight o melhor lugar para <br> transferir seu dinheiro com segurança.
                    </h1>

                    <p class="text-xl text-gray-600 leading-relaxed max-w-lg mx-auto">
                        A plataforma especializada que conecta usuários comuns e lojistas.
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
