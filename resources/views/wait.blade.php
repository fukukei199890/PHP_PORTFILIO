<x-user-layout>

    <div class="max-w-md mx-auto min-h-screen bg-gray-50 pb-20">

        {{-- メインコンテンツ --}}
        <div class="flex flex-col items-center pt-20 px-6 pb-24">



            {{-- カード --}}
            <div class="bg-[#FFFFFF] border border-[#FFFFFF] 
                    rounded-[40px] 
                    w-full max-w-md 
                    p-10 text-center shadow-sm">

                <p class="text-xl font-bold mb-6 text-gray-800">
                    出品が完了しました！
                </p>

                {{-- 画像表示 --}}
                <!-- 追記福田 -->
                @if(session('image'))
                <div class="mb-6">
                    <img
                        src="{{ asset('storage/' . session('image')) }}"
                        class="w-48 h-48 object-cover mx-auto rounded-2xl border border-gray-300 shadow">
                </div>
                @endif

                {{-- セッションデータがある場合のみ表示 --}}
                @if(session('series_name') || session('char_name'))
                <div class="bg-white/60 rounded-2xl p-4 mb-6 text-left border border-white/40">
                    <div class="mb-3">
                        <span class="text-xs text-gray-500 block mb-1">シリーズ名</span>
                        <p class="text-gray-800 font-semibold">{{ session('series_name', '未設定') }}</p>
                    </div>
                    <div>
                        <span class="text-xs text-gray-500 block mb-1">キャラクター名</span>
                        <p class="text-gray-800 font-semibold">{{ session('char_name', '未設定') }}</p>
                    </div>
                </div>
                @endif

                <p class="text-base text-gray-700 leading-relaxed">
                    条件がマッチするまで<br>そのままお待ちください。
                </p>
                {{-- リンク --}}

                <div class="p-4">

                    <a href="{{ route('top') }}">
                        <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded-xl font-bold text-sm">
                            ホームに戻る
                        </button>
                    </a>

                </div>
            </div>





        </div>

    </div>
</x-user-layout>