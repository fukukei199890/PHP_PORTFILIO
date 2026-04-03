<x-user-layout>
    <div class="max-w-md mx-auto min-h-screen bg-gray-50 pb-20">
        <div class="p-4">
            {{-- メインタイトル --}}
            <div class="mb-6 border-b border-gray-200 pb-2">
                <x-section-title>通知一覧</x-section-title>
            </div>

            {{-- 1. 新着メッセージセクション --}}
            <section class="mb-10">
                <div class="flex items-center mb-4">
                    <span class="p-2 bg-blue-100 rounded-lg mr-2">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                        </svg>
                    </span>
                    <x-section-title>新着メッセージ</x-section-title>
                </div>

                @php
                $unreadMessage = Auth::user()->unreadNotifications->where('type', 'App\\Notifications\\MessageReceived');
                @endphp

                @if($unreadMessage->isEmpty())
                <div class="bg-white rounded-xl p-6 text-center border border-dashed border-gray-300">
                    <p class="text-sm text-gray-400">新しいメッセージはありません</p>
                </div>
                @else
                <ul class="space-y-3">
                    @foreach ($unreadMessage as $row)
                    <li class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 transition-active active:bg-gray-50">
                        <div class="flex justify-between items-start mb-3">
                            <p class="text-sm text-gray-800 leading-snug">
                                <span class="font-bold text-blue-600">{{ $row->data['sender_name'] ?? '不明なユーザー' }}</span> さんからメッセージが届いています
                            </p>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-[10px] font-medium text-gray-400 bg-gray-100 px-2 py-1 rounded">
                                {{ $row['created_at']->diffForHumans() }}
                            </span>
                            <form method="post" action="{{ route('notification.markAsRead') }}">
                                @csrf
                                <input type="hidden" name="notificationId" value="{{ $row->id }}">
                                <button class="text-xs font-bold bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-full shadow-md shadow-blue-100 transition-all">
                                    内容を読む
                                </button>
                            </form>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @endif
            </section>

            {{-- 2. リクエスト受信セクション --}}
            <section class="mb-10">
                <div class="flex items-center mb-4">
                    <span class="p-2 bg-orange-100 rounded-lg mr-2">
                        <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </span>
                    <x-section-title>リクエストの通知</x-section-title>
                </div>

                @php
                $unreadRequestReceived = Auth::user()->unreadNotifications->where('type', 'App\\Notifications\\RequestReceived');
                @endphp

                @if($unreadRequestReceived->isEmpty())
                <div class="bg-white rounded-xl p-6 text-center border border-dashed border-gray-300">
                    <p class="text-sm text-gray-400">新しいリクエストはありません</p>
                </div>
                @else
                <ul class="space-y-3">
                    @foreach ($unreadRequestReceived as $row)
                    <li class="bg-white p-4 rounded-2xl shadow-sm border border-orange-100">
                        <p class="text-sm text-gray-800 mb-4">
                            <span class="font-bold">{{ $row->sender->name ?? '不明なユーザー' }}</span> さんから<br>
                            <span class="text-orange-600 font-semibold">新着のリクエスト</span>があります
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-[10px] font-medium text-gray-400">{{ $row->created_at->diffForHumans() }}</span>
                            <form method="post" action="{{ route('notification.markAsRead') }}">
                                @csrf
                                <input type="hidden" name="notificationId" value="{{ $row->id }}">
                                <button class="text-xs font-bold bg-orange-500 hover:bg-orange-600 text-white px-5 py-2 rounded-full shadow-md shadow-orange-100 transition-all">
                                    詳細を見る
                                </button>
                            </form>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @endif
            </section>

            {{-- 3. リクエスト承認セクション --}}
            <section class="mb-10">
                <div class="flex items-center mb-4">
                    <span class="p-2 bg-green-100 rounded-lg mr-2">
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </span>
                    <h2 class="text-base font-bold text-gray-700">リクエスト承認の通知</h2>
                </div>

                @php
                $unreadRequestAccepted = Auth::user()->unreadNotifications->where('type', 'App\\Notifications\\RequestAccepted');
                @endphp

                @if($unreadRequestAccepted->isEmpty())
                <div class="bg-white rounded-xl p-6 text-center border border-dashed border-gray-300">
                    <p class="text-sm text-gray-400">承認されたリクエストはありません</p>
                </div>
                @else
                <ul class="space-y-3">
                    @foreach ($unreadRequestAccepted as $row)
                    <li class="bg-white p-4 rounded-2xl shadow-sm border-l-4 border-l-green-400 border-y border-r border-gray-100">
                        <p class="text-sm text-gray-800 mb-3">
                            <span class="font-bold underline decoration-green-300">{{ $row->sender->name ?? '不明なユーザー' }}</span> さんへのリクエストが承認されました！
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-[10px] font-medium text-gray-400">{{ $row->created_at->diffForHumans() }}</span>
                            <form method="post" action="{{ route('notification.markAsRead') }}">
                                @csrf
                                <input type="hidden" name="notificationId" value="{{ $row->id }}">
                                <button class="text-xs font-bold text-green-600 border border-green-200 px-4 py-1.5 rounded-lg hover:bg-green-50 transition-colors">
                                    確認
                                </button>
                            </form>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @endif
            </section>
        </div>
    </div>
</x-user-layout>