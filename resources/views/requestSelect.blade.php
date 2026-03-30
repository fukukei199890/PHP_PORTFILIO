<x-user-layout>
    <div class="max-w-md mx-auto min-h-screen bg-gray-50 pb-20">
        <!-- 各ページタイトル -->
        <x-section-title>申請したリクエスト一覧</x-section-title>



        <div class="px-4 space-y-4">
            @if ($sendRequests->isEmpty())
            <div class="text-center py-20 text-gray-400">
                <p>申請中のリクエストはありません</p>
                <a href="{{ route('login') }}">
                    <x-original-button color="black" class=" px-5 mt-5">
                        ログインして確認する
                    </x-original-button>
            </div>
            @else
            @foreach ($sendRequests as $row)
            {{-- リクエストカード --}}
            <div class="bg-white border border-gray-200 rounded-2xl p-5 shadow-sm">

                <div class="flex justify-between items-start mb-3 border-b border-gray-50 pb-2">
                    <div>
                        <p class="font-bold text-lg text-gray-900 tracking-tight">
                            {{ $row->listed_item->user->name }} さんへのリクエスト
                        </p>
                    </div>
                </div>

                {{-- 相手のアイテム情報 --}}
                <div class="mb-4">
                    <p class="text-[13px] mb-1 text-yellow-400">希望する商品</p>
                    <div class="bg-gray-50 rounded-lg p-3 text-center">
                        @if ($row->listed_item->images->first())
                        <img src="{{ asset('storage/' . ($row->listed_item->images->first()->image_url ?? $row->listed_item->images->first()->path)) }}"
                            class="mx-auto h-40 object-contain rounded-md shadow-sm">
                        @else
                        <div class="h-40 flex items-center justify-center bg-gray-200 rounded-md">
                            <p class="text-xs text-gray-400">画像なし</p>
                        </div>
                        @endif
                    </div>
                    <div class="bg-gray-50 rounded-lg p-3 mt-2">
                        <p class="text-base font-bold">シリーズ名:{{ $row->listed_item->series_name }}
                        </p>
                        <p class="text-sm text-gray-800">キャラ名:{{ $row->listed_item->char_name }}</p>
                    </div>
                </div>

                {{-- 自分の出品物情報 --}}
                <div class="mb-4">
                    <p class="text-[13px] text-blue-500 mb-1">申請した商品</p>
                    <div class="bg-gray-50 rounded-lg p-3 text-center mb-2">
                        @if ($row->image_url)
                        <img src="{{ asset('storage/' . $row->image_url) }}"
                            class="mx-auto h-40 object-contain rounded-md shadow-sm">
                        @else
                        <div class="h-40 flex items-center justify-center bg-gray-200 rounded-md">
                            <p class="text-xs text-gray-400">画像なし</p>
                        </div>
                        @endif
                    </div>
                    <div class="bg-gray-50 rounded-lg p-3">
                        <p class="text-base font-bold">シリーズ名:{{ $row->request_series }}</p>
                        <p class="text-sm text-gray-800">キャラ名:{{ $row->request_char }}</p>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
    <div class="max-w-md mx-auto min-h-screen bg-gray-50 pb-20">
        <!-- 各ページタイトル -->
        <x-section-title>届いたリクエスト一覧</x-section-title>
        <!-- 見出し -->
        <!-- <h2 class="text-center text-lg py-4 border-b text-gray-900 ">届いたリクエスト一覧</h2> -->

        <div class="px-4 space-y-4">
            {{-- リクエストがない場合の表示 --}}
            @if ($tradeRequests->isEmpty())
            <div class="text-center py-20 text-gray-400">
                <i class="fa-regular fa-folder-open text-4xl mb-3 block"></i>
                <p>現在届いているリクエストはありません</p>
            </div>
            @else
            @foreach ($tradeRequests as $row)
            {{-- リクエストカード --}}
            <div class="bg-white border border-gray-200 rounded-2xl p-5 shadow-sm">

                <div class="flex justify-between items-start mb-3 border-b border-gray-100 pb-2">
                    <div>
                        <p class="font-bold text-lg text-gray-900 tracking-tight">
                            {{ $row->user->name }} さんへのリクエスト
                        </p>
                    </div>
                </div>

                {{-- 相手のアイテム情報 --}}
                <div class="mb-4">
                    <p class="text-[13px] text-blue-500 mb-1">相手の提示商品</p>
                    <div class="bg-gray-50 rounded-lg p-3 text-center">
                        @if ($row->image_url)
                        <img src="{{ asset('storage/' . $row->image_url) }}"
                            class="mx-auto h-40 object-contain rounded-md shadow-sm">
                        @else
                        <div class="h-40 flex items-center justify-center bg-gray-200 rounded-md">
                            <p class="text-xs text-gray-400">画像なし</p>
                        </div>
                        @endif
                    </div>
                    <div class="bg-gray-50 rounded-lg p-3 mt-2">
                        <p class="text-base font-bold">シリーズ名:{{ $row->request_series }}</p>
                        <p class="text-sm text-gray-800">キャラ名:{{ $row->request_char }}</p>
                    </div>
                </div>

                {{-- 自分の出品物情報 --}}
                <div class="mb-4">
                    <p class="text-[13px] text-yellow-400 mb-1">自分の出品物</p>
                    <div class="bg-gray-50 rounded-lg p-3 text-center mb-2">
                        @if ($row->listed_item->images->first())
                        <img src="{{ asset('storage/' . ($row->listed_item->images->first()->image_url ?? $row->listed_item->images->first()->path)) }}"
                            class="mx-auto h-40 object-contain rounded-md shadow-sm">
                        @else
                        <div class="h-40 flex items-center justify-center bg-gray-200 rounded-md">
                            <p class="text-xs text-gray-400">画像なし</p>
                        </div>
                        @endif
                    </div>
                    <div class="bg-gray-50 rounded-lg p-3">
                        <p class="text-base font-bold ">シリーズ名:{{ $row->listed_item->series_name }}
                        </p>
                        <p class="text-sm text-gray-800">キャラ名:{{ $row->listed_item->char_name }}</p>
                    </div>
                </div>

                <form method="get" action="{{ route('requestanswer') }}">
                    <input type="hidden" name="request_id" value="{{ $row->id }}">
                    <x-original-button color="yellow" class="w-auto px-10">
                        リクエスト詳細を確認する
                    </x-original-button>
                </form>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</x-user-layout>