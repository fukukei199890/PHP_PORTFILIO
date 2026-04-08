<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Kaisei+Tokumin:wght@700&family=Zen+Maru+Gothic:wght@700&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/user-app.css'])
</head>

<body>
    @if (session('message') || session('error'))
        <div class="max-w-md mx-auto mt-4 px-4">
            {{-- 動的にクラスを切り替え：errorがあれば赤、なければ緑 --}}
            <div class="{{ session('error') ? 'bg-red-100 border-red-400 text-red-700' : 'bg-green-100 border-green-400 text-green-700' }} border px-4 py-3 rounded-xl relative text-sm font-bold shadow-sm"
                role="alert">
                <span class="block sm:inline">{{ session('error') ?? session('message') }}</span>
            </div>
        </div>
    @endif


    <!-- Page Content -->
    <div class="min-h-screen flex flex-col pb-10">

        <main class="flex-grow">
            <div class="max-w-md mx-auto px-4 py-6">
                {{ $slot }}
            </div>
        </main>
        <!-- Tailwindが効かなかったのでstyleタグを使用しています -->
        <!-- <footer class="fixed bottom-0 left-0 right-0 w-full bg-white border-t border-gray-200 z-[9999]"> -->
        <footer
            style="position: fixed !important; bottom: 0 !important; left: 0; width: 100%; background-color: white;  z-index: 9999;">
            <!-- fixed bottom-0 left-0 w-full bg-white border-t border-gray-200 z-50 -->
            <!-- グローバルナビゲーション -->
            <nav class="flex items-center justify-between flex-wrap max-w-md mx-auto">

                <!-- ホーム -->
                <div class="flex flex-col items-center flex-1">
                    <a href="{{ route('top') }}" class="flex flex-col items-center">
                        <span class="text-xl h-8 flex items-center justify-center">🏠</span>
                        <span class="text-[13px]">ホーム</span>
                    </a>
                </div>

                <!-- 探す -->
                <div class="flex flex-col items-center flex-1">
                    <a href="{{ route('seach') }}" class="flex flex-col item-center">
                        <span class="text-xl h-8 flex items-center justify-center">🔍</span>
                        <span class="text-[13px]">探す</span>
                    </a>
                </div>

                <!-- 出品（ログイン前後で遷移先変更） -->
                <div class="flex flex-col items-center flex-1">

                    {{-- ログイン後 --}}
                    @auth
                        <a href="{{ route('post') }}" class="flex flex-col items-center">
                            <span class="text-xl h-8 flex items-center justify-center">📷</span>
                            <span class="text-[13px]">出品</span>
                        </a>
                    @endauth

                    {{-- ログイン前 --}}
                    @guest
                        <a href="{{ route('postbefore') }}" class="flex flex-col items-center">
                            <span class="text-xl h-8 flex items-center justify-center">📷</span>
                            <span class="text-[13px]">出品</span>
                        </a>
                    @endguest

                </div>

                <!-- 通知 -->
                <div class="flex flex-col items-center relative flex-1">
                    {{-- ログイン後 --}}
                    @auth
                        {{-- 通知の数を表示 --}}
                        @php
                            $count = Auth::user()
                                ->unreadNotifications() // 未読の通知を取得
                                ->where('type', 'App\Notifications\MessageReceived') // メッセージのタイプ
                                ->count(); // 数を取得
                        @endphp
                        @if ($count > 0)
                            <a href="{{ route('messageReceived') }}" class="flex flex-col items-center">
                                <span class="text-xl h-8 flex items-center justify-center relative">
                                    ✉️
                                    {{-- 赤丸バッジ --}}
                                    <span class="absolute -top-1 -right-2 bg-red-500 text-white text-[13px] font-bold rounded-full h-4 w-4 flex items-center justify-center border border-white">
                                        {{ Auth::user()->unreadNotifications->count() }}
                                    </span>
                                </span>
                                <!-- <span class="text-xl h-8 flex items-center justify-center">✉️</span>
                                {{ Auth::user()->unreadNotifications->count() }}
                            </a> -->
                        @else
                            <a href={{ route('messageselect') }} class="flex flex-col items-center">
                                <span class="text-xl h-8 flex items-center justify-center">✉️</span>
                                <span class="text-[13px]">メッセージ</span>
                            </a>
                        @endif
                    @endauth

                    {{-- ログイン前 --}}
                    @guest
                        <a href="{{ route('messageselect') }}" class="flex flex-col items-center">
                            <span class="text-xl h-8 flex items-center justify-center">✉️</span>
                            <span class="text-[13px]">メッセージ</span>
                        </a>
                    @endguest
                </div>

                <!-- リクエストメッセージ -->
                <div class="flex flex-col items-center flex-1">
                    {{-- ログイン後 --}}
                    @auth
                        @php
                            $count = DB::table('trade_requests')
                                ->join('listed_items', 'trade_requests.listed_item_id', '=', 'listed_items.id')
                                ->where('listed_items.user_id', '=', Auth::id())
                                // リクエストがソフトデリートされていないか
                                ->whereNull('trade_requests.deleted_at')
                                // 出品物がソフトデリートされていないか
                                ->whereNull('listed_items.deleted_at')
                                ->count();
                        @endphp
                        @if ($count > 0)
                            <a href="{{ route('requestSelect') }}" class="flex flex-col items-center">
                                <span class="text-xl h-8 flex items-center justify-center">🤝</span>
                                <span class="text-[13px]">{{ $count }}</span>
                            </a>
                        @else
                            <a href="{{ route('requestSelect') }}" class="flex flex-col items-center">
                                <span class="text-xl h-8 flex items-center justify-center">🤝</span>
                                <span class="text-[13px]">交換</span>
                            </a>
                        @endif
                    @endauth

                    {{-- ログイン前 --}}
                    @guest
                        <a href="{{ route('requestSelect') }}" class="flex flex-col items-center">
                            <span class="text-xl h-8 flex items-center justify-center">🤝</span>
                            <span class="text-[13px]">交換</span>
                        </a>
                    @endguest
                </div>

                <!-- マイページ -->
                <div class="flex flex-col items-center flex-1">
                    {{-- ログイン後 --}}
                    @auth
                        <a href="{{ route('mypage') }}" class="flex flex-col items-center">
                            <span class="text-xl h-8 flex items-center justify-center">👤</span>
                            <span class="text-[13px]">マイページ</span>
                        </a>
                    @endauth

                    {{-- ログイン前 --}}
                    @guest
                        <a href="{{ route('mypagebefore') }}" class="flex flex-col items-center">
                            <span class="text-xl h-8 flex items-center justify-center">👤</span>
                            <span class="text-[13px]">マイページ</span>
                        </a>
                    @endguest
                </div>

            </nav>
        </footer>
    </div>
</body>

</html>
