<x-user-layout>
    <div class="max-w-md mx-auto min-h-screen bg-gray-50 pb-20">
        {{-- ヘッダー --}}
        <div class="bg-white border-b py-4 mb-4">
            <h1 class="text-center text-lg font-bold text-gray-800">届いたリクエスト一覧</h1>
        </div>

        <div class="px-4 space-y-4">
            @foreach ($tradeRequests as $row)
            {{-- リクエストカード --}}
            <div class="bg-white border border-gray-200 rounded-2xl p-5 shadow-sm">

                <div class="flex justify-between items-start mb-3 border-b border-gray-100 pb-2">
                    <div>
                        <p class="font-bold text-gray-900">
                            <i class="fa-regular fa-user mr-1 text-gray-400"></i>{{ $row->user->name }} さんからのリクエスト
                        </p>
                    </div>

                </div>

                {{-- 相手のアイテム情報 --}}
                <div class="mb-4">
                    <p class="text-[11px] text-gray-500 mb-1">相手の提示商品</p>

                    <div class="bg-gray-50 rounded-lg p-3 text-center">
                        @if($row->image_url)
                        {{-- 画像が存在する場合 --}}
                        <img src="{{ asset('storage/' . $row->image_url) }}"
                            alt="リクエスト画像"
                            class="mx-auto h-40 object-contain rounded-md shadow-sm">
                        @else
                        {{-- 画像がない場合のプレースホルダー --}}
                        <div class="h-40 flex items-center justify-center bg-gray-200 rounded-md">
                            <p class="text-xs text-gray-400">画像なし</p>
                        </div>
                        @endif
                    </div>
                    <div class="bg-gray-50 rounded-lg p-3">
                        <p class="text-sm font-medium text-gray-800">シリーズ名:{{ $row->request_series }}</p>
                        <p class="text-sm text-gray-600">キャラ名:{{ $row->request_char }}</p>
                    </div>



                    {{-- 自分のアイテム情報 --}}
                    <div class="mb-4">
                        <p class="text-[11px] text-gray-500 mb-1">自分の出品物</p>
                        <div class="bg-gray-50 rounded-lg p-3 text-center">
                            @if($row->listed_item->image_url)

                            {{-- 画像が存在する場合 --}}
                            <img src="{{ asset('storage/' . $row->listed_item->image_url) }}"
                                alt="リクエスト画像"
                                class="mx-auto h-40 object-contain rounded-md shadow-sm">
                            @else
                            {{-- 画像がない場合のプレースホルダー --}}
                            <div class="h-40 flex items-center justify-center bg-gray-200 rounded-md">
                                <p class="text-xs text-gray-400">画像なし</p>
                            </div>
                            @endif
                        </div>

                        <div class="bg-gray-50 rounded-lg p-3">
                            <p class="text-sm font-medium text-gray-800">シリーズ名:{{ $row->listed_item->series_name }}</p>
                            <p class="text-sm text-gray-600">キャラ名:{{ $row->listed_item->char_name }}</p>
                        </div>
                    </div>



                    {{-- アクションボタン --}}
                    <form method="get" action="{{ route('requestanswer') }}">
                        <input type="hidden" name="request_id" value="{{ $row->id }}">
                        <button type="submit"
                            class="w-full bg-blue-500 text-white py-3 rounded-xl font-bold text-sm">
                            リクエスト詳細を確認する
                        </button>
                    </form>
                </div>
                @endforeach

                {{-- リクエストがない場合の表示 --}}
                @if($tradeRequests->isEmpty())
                <div class="text-center py-20 text-gray-400">
                    <i class="fa-regular fa-folder-open text-4xl mb-3 block"></i>
                    <p>現在届いているリクエストはありません</p>
                </div>
                @endif
            </div>
        </div>
</x-user-layout>