<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/user-app.css'])
</head>

<body class="font-sans antialiased">


    <!-- Page Content -->
    <div class="min-h-screen flex flex-col">

        <main class="flex-grow pb-20">
            <div class="max-w-md mx-auto px-4 py-6">
                {{ $slot }}
            </div>
        </main>
        <footer>
            <!--  -->
            <nav class="flex items-center justify-between flex-wrap max-w-md mx-auto">
                <div class="flex flex-col items-center">
                    <span class="text-xl">🏠</span>
                    <span><a href="">ホーム</a></span>
                </div>

                <div class="flex flex-col items-center">
                    <span class="text-xl">🔍</span>
                    <span><a href="">探す</a></span>
                </div>

                <div class="flex flex-col items-center">
                    <span class="text-xl">📷</span>
                    <span><a href="">出品</a></span>
                </div>

                <div class="flex flex-col items-center relative">
                    <span class="text-xl">🔔</span>
                    <span><a href="">通知</a></span>
                </div>

                <div class="flex flex-col items-center">
                    <span class="text-xl">👤</span>
                    <span><a href="">マイページ</a></span>
                </div>

    </div>
    </nav>
    <!--  -->
    </footer>
    </div>
</body>

</html>