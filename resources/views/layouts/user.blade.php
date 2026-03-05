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

    <div>
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
        <footer>
            <nav class="flex flex-items-center justify-between flwx-wrap">
                <div class="inline">
                    <a href="">ホーム</a>
                </div>
                <div class="inline">
                    <a href="">探す</a>
                </div>
                <div class="inline">
                    <a href="">出品</a>
                </div>
                <div class="inline">
                    <a href="">通知</a>
                </div>
                <div class="inline">
                    <a href="">マイページ</a>
                </div>
            </nav>
        </footer>
    </div>
</body>

</html>
