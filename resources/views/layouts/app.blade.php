<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=bad-script:400|figtree:400,500,600" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">

        @auth
            @if (! Auth::user()->hasVerifiedEmail())
                <div class="p-2 text-center bg-rose-500 flex items-center justify-center gap-4">
                    <p class="text-white font-medium text-xl">Please verify your email address to continue using the app.</p>
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div>
                            <x-button type="submit">
                                {{ __('Resend Verification Email') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            @endif
        @endauth
        <x-banner />

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex items-center">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
