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

        <main class="flex-grow">
            <div class="max-w-md mx-auto px-4 py-6">
                {{ $slot }}
            </div>
        </main>
        <footer>
            <!-- グローバルナビゲーション -->
            <nav class="flex items-center justify-between flex-wrap max-w-md mx-auto">

                <!-- ホーム -->
                <div class="flex flex-col items-center">
                    <span class="text-xl">🏠</span>
                    <span><a href="{{ route('top') }}">ホーム</a></span>
                </div>

                <!-- 探す -->
                <div class="flex flex-col items-center">
                    <span class="text-xl">🔍</span>
                    <span><a href="{{ route('seach') }}">探す</a></span>
                </div>

                <!-- 出品（ログイン前後で遷移先変更） -->
                <div class="flex flex-col items-center">
                    <span class="text-xl">📷</span>

                    {{-- ログイン後 --}}
                    @auth
                        <span><a href="{{ route('post') }}">出品</a></span>
                    @endauth

                    {{-- ログイン前 --}}
                    @guest
                        <span><a href="{{ route('postbefore') }}">出品</a></span>
                    @endguest

                </div>

                <!-- 通知 -->
                <div class="flex flex-col items-center relative">
                    <span class="text-xl">🔔</span>
                    {{-- ログイン後 --}}
                    @auth
                        {{-- 通知の数を表示 --}}
                        @if (Auth::user()->unreadNotifications)
                            @foreach (Auth::user()->unreadNotifications as $notification)
                                @if ($loop->last)
                                    <a href="{{ route('messageReceived') }}">
                                        <p>{{ $loop->iteration }}</p>
                                    </a>
                                @endif
                            @endforeach
                        @else
                            <span><a href="{{ route('messageselect') }}">通知なし</a></span>
                        @endif
                    @endauth

                    {{-- ログイン前 --}}
                    @guest
                        <span><a href="{{ route('messageselect') }}">通知</a></span>
                    @endguest
                </div>

                <!-- リクエストメッセージ -->
                <div class="flex flex-col items-center">
                    <span class="text-xl">✉</span>

                    {{-- ログイン後 --}}
                    @auth
                        <span><a href="{{ route('requestSelect') }}">リクエスト</a></span>
                    @endauth

                    {{-- ログイン前 --}}
                    @guest
                        <span><a href="{{ route('requestSelect') }}">リクエスト</a></span>
                    @endguest
                </div>

                <!-- マイページ -->
                <div class="flex flex-col items-center">
                    <span class="text-xl">👤</span>

                    {{-- ログイン後 --}}
                    @auth
                        <span><a href="{{ route('mypage') }}">マイページ</a></span>
                    @endauth

                    {{-- ログイン前 --}}
                    @guest
                        <span><a href="{{ route('mypagebefore') }}">マイページ</a></span>
                    @endguest
                </div>

            </nav>
        </footer>
    </div>
</body>

</html>
