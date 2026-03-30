<x-user-layout>
    <div class="min-h-screen bg-white pb-24 text-gray-900">
        {{-- メインコンテンツ --}}
        <div class="px-6 pt-10">
            @isset($requestData)
            {{-- タイトル --}}
            <h2 class="text-center text-lg font-bold mb-6 text-gray-800">お相手が見つかりました！</h2>

            <div class="bg-white border border-gray-200 rounded-[30px] p-6 mb-8 shadow-sm">

                {{-- ユーザー情報セクション --}}
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <p class="text-xl font-bold text-gray-900">{{ $requestData->user->name }}</p>
                        <p class="text-sm font-medium text-gray-500 mt-0.5">評価 ★{{ $score }}</p>
                    </div>
                    {{-- 相手のアイコン --}}
                    <div class="shrink-0">
                        <img src="{{ $requestData->user->icon_url ?: asset('images/default-icon.png') }}"
                            alt="{{ $requestData->user->name }}さんのアイコン"
                            class="w-16 h-16 rounded-full object-cover border-2 border-gray-100 shadow-sm bg-gray-50">
                    </div>
                </div>

                {{-- 交換商品情報 --}}
                <div class="space-y-4 text-[15px] leading-relaxed border-t border-gray-50 pt-4">
                    <p class="font-bold text-gray-700 text-sm tracking-wider uppercase">交換内容</p>

                    <div class="space-y-3">
                        {{-- 自分 --}}
                        <div class="flex items-start">
                            <span class="font-bold text-blue-600 w-14 shrink-0">自分</span>
                            <div class="text-gray-800">
                                <p class="font-medium">{{ $requestData->listed_item->series_name }}</p>
                                <p class="text-sm text-gray-600">{{ $requestData->listed_item->char_name }}</p>
                            </div>
                        </div>

                        {{-- 相手 --}}
                        <div class="flex items-start">
                            <span class="font-bold text-red-500 w-14 shrink-0">相手</span>
                            <div class="text-gray-800">
                                <p class="font-medium">{{ $requestData->request_series }}</p>
                                <p class="text-sm text-gray-600">{{ $requestData->request_char }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- 交換場所 --}}
                    <div class="mt-4 pt-3 border-t border-dashed border-gray-200 flex items-center gap-2 text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <p class="text-sm"><span class="font-semibold">交換場所：</span>
                            {{ $requestData->listed_item->exchange_area_label }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- アクションボタン --}}
            <div class="flex flex-col items-center gap-4 mt-10">
                <form method="post" action="{{ route('requestanswer.make_match') }}"
                    class="w-full flex justify-center">
                    @csrf
                    <input type="hidden" name="action" value="yes">
                    <x-original-button color="emerald" class="w-auto px-10">
                        この内容で交換する
                    </x-original-button>
                </form>

                <form method="POST" action="{{ route('requestanswer.delete') }}">
                    @csrf
                    <input type="hidden" name="action" value="no">
                    <input type="hidden" name="request_id" value="{{ $requestData->id }}">
                    <button type="submit" class="text-sm text-gray-500 hover:text-red-500">
                        今回は見送る
                    </button>
                </form>
            </div>
            @else
            <div class="text-center pt-20">
                <p class="text-gray-500">リクエストデータが存在しません</p>
            </div>
            @endisset
        </div>
    </div>
</x-user-layout>