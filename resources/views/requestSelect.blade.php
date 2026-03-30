<x-user-layout>
    {{-- 1. 申請したリクエスト一覧 --}}
    @auth
    <x-section-title>申請したリクエスト一覧</x-section-title>
    @endauth

    <div class="max-w-md mx-auto bg-gray-50 pb-10">
        <div class="px-4 space-y-4">

            @guest
            {{-- 【修正ポイント】ログインしていない場合のみ、このブロックを表示 --}}
            <div class="flex flex-col items-center justify-center pt-32 px-10 text-center">
                <p class="text-gray-500 font-medium" style="font-family: 'Zen Maru Gothic', sans-serif;">ログインすると申請状況を確認できます</p>
                <a href="{{ route('login') }}" class="w-full">
                    <x-original-button class="w-full mt-6 py-4 shadow-md">
                        ログインする
                    </x-original-button>
                </a>
            </div>
            @endguest

            @auth
            {{-- 【修正ポイント】ログインしている場合 --}}
            @if ($sendRequests->isEmpty())
            {{-- ログインしているが、リクエストが0件の場合 --}}
            <div class="flex flex-col items-center justify-center pt-32 px-10 text-center text-gray-400">
                <i class="fa-regular fa-paper-plane text-5xl mb-5"></i>
                <p class="font-medium text-base" style="font-family: 'Zen Maru Gothic', sans-serif;">申請中のリクエストはありません</p>
            </div>
            @else
            {{-- ログインしていて、リクエストがある場合：元の画像を表示--}}
            @foreach ($sendRequests as $row)
            <div class="bg-white border border-gray-200 rounded-3xl p-6 shadow-sm mb-6">

                {{-- タイトル --}}
                <div class="flex justify-between items-start mb-5 border-b border-gray-100 pb-3">
                    <p class="font-bold text-xl text-gray-900 tracking-tight" style="font-family: 'Zen Maru Gothic', sans-serif;">
                        {{ $row->listed_item->user->name }} さんへのリクエスト
                    </p>
                </div>

                {{-- 相手のアイテム情報 --}}
                <div class="mb-6">
                    <p class="text-xs font-bold text-yellow-500 mb-2 uppercase tracking-wider" style="font-family: 'Zen Maru Gothic', sans-serif;">希望する商品</p>
                    <div class="bg-gray-50 rounded-2xl p-4 text-center border border-gray-100">
                        {{-- ここから画像表示表示 --}}
                        @if ($row->listed_item->images->first())
                        <img src="{{ asset('storage/' . ($row->listed_item->images->first()->image_url ?? $row->listed_item->images->first()->path)) }}"
                            class="mx-auto h-48 object-contain rounded-xl shadow-sm border-2 border-white">
                        @else
                        <div class="h-48 flex items-center justify-center bg-gray-100 rounded-xl border-2 border-white">
                            <p class="text-xs text-gray-300 font-bold">No Image</p>
                        </div>
                        @endif

                    </div>
                    <div class="bg-gray-50 rounded-2xl p-4 mt-3 border border-gray-100">
                        <p class="text-base font-bold text-gray-900">{{ $row->listed_item->series_name }}</p>
                        <p class="text-sm text-gray-600">{{ $row->listed_item->char_name }}</p>
                    </div>
                </div>

                {{--分の出品物情報 --}}
                <div class="mb-6">
                    <p class="text-xs font-bold text-blue-500 mb-2 uppercase tracking-wider" style="font-family: 'Zen Maru Gothic', sans-serif;">申請した商品</p>
                    <div class="bg-gray-50 rounded-2xl p-4 text-center border border-gray-100 mb-3">
                        {{-- ここから画像表示表示 --}}
                        @if ($row->image_url)
                        <img src="{{ asset('storage/' . $row->image_url) }}"
                            class="mx-auto h-48 object-contain rounded-xl shadow-sm border-2 border-white">
                        @else
                        <div class="h-48 flex items-center justify-center bg-gray-100 rounded-xl border-2 border-white">
                            <p class="text-xs text-gray-300 font-bold">No Image</p>
                        </div>
                        @endif

                    </div>
                    <div class="bg-gray-50 rounded-2xl p-4 border border-gray-100">
                        <p class="text-base font-bold text-gray-900">{{ $row->request_series }}</p>
                        <p class="text-sm text-gray-600">{{ $row->request_char }}</p>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
            @endauth
        </div>
    </div>

    {{-- 2. 届いたリクエスト一覧 --}}
    @auth
    <div class="pt-10">
        <x-section-title>届いたリクエスト一覧</x-section-title>
    </div>
    <div class="max-w-md mx-auto bg-gray-50 pb-20">
        <div class="px-4 space-y-4">
            @if ($tradeRequests->isEmpty())
            <div class="text-center py-20 text-gray-400">
                <i class="fa-regular fa-folder-open text-5xl mb-5 block"></i>
                <p class="text-base" style="font-family: 'Zen Maru Gothic', sans-serif;">現在届いているリクエストはありません</p>
            </div>
            @else
            @foreach ($tradeRequests as $row)
            <div class="bg-white border border-gray-200 rounded-3xl p-6 shadow-sm mb-6">

                {{-- タイトル --}}
                <div class="flex justify-between items-start mb-5 border-b border-gray-100 pb-3">
                    <p class="font-bold text-xl text-gray-900 tracking-tight" style="font-family: 'Zen Maru Gothic', sans-serif;">
                        {{ $row->user->name }} さんからのリクエスト
                    </p>
                </div>

                {{-- 【画像復活】相手の提示商品 --}}
                <div class="mb-6">
                    <p class="text-xs font-bold text-blue-500 mb-2 uppercase tracking-wider" style="font-family: 'Zen Maru Gothic', sans-serif;">相手の提示商品</p>
                    <div class="bg-gray-50 rounded-2xl p-4 text-center border border-gray-100">
                        {{-- ここから画像表示表示 --}}
                        @if ($row->image_url)
                        <img src="{{ asset('storage/' . $row->image_url) }}"
                            class="mx-auto h-48 object-contain rounded-xl shadow-sm border-2 border-white">
                        @else
                        <div class="h-48 flex items-center justify-center bg-gray-100 rounded-xl border-2 border-white">
                            <p class="text-xs text-gray-300 font-bold">No Image</p>
                        </div>
                        @endif

                    </div>
                    <div class="bg-gray-50 rounded-2xl p-4 mt-3 border border-gray-100">
                        <p class="text-base font-bold text-gray-900">{{ $row->request_series }}</p>
                        <p class="text-sm text-gray-600">{{ $row->request_char }}</p>
                    </div>
                </div>

                {{-- 自分の出品物情報 --}}
                <div class="mb-6">
                    <p class="text-xs font-bold text-yellow-500 mb-2 uppercase tracking-wider" style="font-family: 'Zen Maru Gothic', sans-serif;">自分の出品物</p>
                    <div class="bg-gray-50 rounded-2xl p-4 text-center border border-gray-100 mb-3">
                        {{-- ここから画像表示表示 --}}
                        @if ($row->listed_item->images->first())
                        <img src="{{ asset('storage/' . ($row->listed_item->images->first()->image_url ?? $row->listed_item->images->first()->path)) }}"
                            class="mx-auto h-48 object-contain rounded-xl shadow-sm border-2 border-white">
                        @else
                        <div class="h-48 flex items-center justify-center bg-gray-100 rounded-xl border-2 border-white">
                            <p class="text-xs text-gray-300 font-bold">No Image</p>
                        </div>
                        @endif

                    </div>
                    <div class="bg-gray-50 rounded-2xl p-4 border border-gray-100">
                        <p class="text-base font-bold text-gray-900">{{ $row->listed_item->series_name }}</p>
                        <p class="text-sm text-gray-600">{{ $row->listed_item->char_name }}</p>
                    </div>
                </div>

                {{-- アクションボタン --}}
                <div class="pt-4 text-center">
                    <form method="get" action="{{ route('requestanswer') }}" class="w-full">
                        <input type="hidden" name="request_id" value="{{ $row->id }}">
                        <x-original-button class="w-full py-4 text-base shadow-xl">
                            詳細を確認する
                        </x-original-button>
                    </form>
                </div>
            </div>
            @endforeach
            @endif
            @endauth
        </div>
    </div>
</x-user-layout>