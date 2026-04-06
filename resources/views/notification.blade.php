<x-user-layout>
    {{-- メインタイトル --}}
    <x-section-title>通知一覧</x-section-title>
    <div class="max-w-md mx-auto min-h-screen bg-gray-50 pb-20">
        <div class="p-4">


            {{-- 1. 新着メッセージセクション --}}
            <section class="mb-10">
                <div class="flex items-center mb-4">

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
                                <span class="font-bold text-gray-600">{{ $row->data['sender_name'] ?? '不明なユーザー' }}</span> さんからメッセージが届いています
                            </p>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-[10px] font-medium text-gray-400 px-2 py-1 ">
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
                    <li class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 transition-active active:bg-gray-50">
                        <p class="text-sm text-gray-800 mb-4">
                            <span class="font-bold text-gray-600">{{ $row->sender->name ?? '不明なユーザー' }}</span> さんから<br>
                            <span>新着のリクエスト</span>があります
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-[10px] font-medium text-gray-400">{{ $row->created_at->diffForHumans() }}</span>
                            <form method="post" action="{{ route('notification.markAsRead') }}">
                                @csrf
                                <input type="hidden" name="notificationId" value="{{ $row->id }}">
                                <button class="text-xs font-bold bg-emerald-500 hover:bg-emerald-600 text-white px-5 py-2 rounded-full shadow-md shadow-emerald-100 transition-all">
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
                    <x-section-title>リクエスト承認の通知</x-section-title>
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
                    <li class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 transition-active active:bg-gray-50">
                        <p class="text-sm text-gray-800 mb-3">
                            <span class="font-bold text-gray-600">{{ $row->sender->name ?? '不明なユーザー' }}</span> さんへのリクエストが承認されました！
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