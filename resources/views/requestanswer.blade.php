<x-user-layout>



    <div class="min-h-screen bg-white pb-24 text-gray-900">
        {{-- メインコンテンツ --}}
        <div class="px-6 pt-10">
            @isset($requestData)
            {{-- タイトル --}}
            <h2 class="text-center text-lg font-medium mb-6">お相手が見つかりました！</h2>

            <div class="bg-[#FFFFFF] border border-[#D9CECE] rounded-[30px] p-6 mb-8 shadow-inner">

                <div class="flex items-center gap-4 mb-6 relative">

                    <div>
                        <p class="text-3xl font-normal text-gray-950">{{ $requestData->user->name }}</p>
                        <p class="text-2xl font-normal text-gray-950 mt-1">評価★{{ $score }}</p>
                    </div>
                </div>

                {{-- 交換商品情報 --}}
                <div class="space-y-6 text-[15px] leading-relaxed">
                    <p class="font-medium text-gray-950">交換商品</p>

                    {{-- 自分 --}}
                    <div class="flex items-start">
                        <span class="font-medium text-gray-950 w-16 shrink-0">自分：</span>
                        <div class="text-gray-900">
                            <p>{{ $requestData->listed_item->series_name }}</p>
                            <p class="mt-1">{{ $requestData->listed_item->char_name }}</p>
                        </div>
                    </div>

                    {{-- 相手 --}}
                    <div class="flex items-start">
                        <span class="font-medium text-gray-950 w-16 shrink-0">相手：</span>
                        <div class="text-gray-900">
                            <p>{{ $requestData->request_series }}</p>
                            <p class="mt-1">{{ $requestData->request_char }}</p>
                        </div>
                    </div>

                    {{-- 交換場所 (リクエストメッセージを利用) --}}
                    <div class="flex items-start text-gray-900">
                        <span class="w-16 shrink-0"></span>
                        <p>交換場所：{{ $requestData->requestMessage }}</p>
                    </div>
                </div>
            </div>

            {{-- アクションボタン --}}
            <div class="flex flex-col items-center gap-4 mt-8">
                {{-- 交換するボタン --}}
                <form method="post" action="{{ route('requestanswer.make_match') }}" class="w-full max-w-[320px]">
                    @csrf
                    <input type="hidden" name="action" value="yes">
                    <button type="submit"
                        class="w-full bg-white text-gray-900 text-xl py-4 rounded-full font-medium tracking-wider
                   border border-gray-900 
                   shadow-[0_2px_4px_0_rgba(0,0,0,0.1)] 
                   active:shadow-none active:translate-y-0.5 transition-all">
                        交換する
                    </button>
                </form>

                {{-- キャンセルするボタン --}}
                <form method="post" action="{{ route('requestanswer.make_match') }}" class="w-full max-w-[320px]">
                    @csrf
                    <input type="hidden" name="action" value="no">
                    <button type="submit"
                        class="w-full bg-white text-gray-900 text-xl py-4 rounded-full font-medium tracking-wider
                   border border-gray-900 
                   shadow-[0_2px_4px_0_rgba(0,0,0,0.1)] 
                   active:shadow-none active:translate-y-0.5 transition-all">
                        キャンセルする
                    </button>
                </form>
            </div>

            @else
            <div class="text-center pt-20">
                <p class="text-gray-600">リクエストデータが存在しません</p>
            </div>
            @endisset
        </div>

    </div>
</x-user-layout>