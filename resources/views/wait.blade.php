<x-user-layout>

    <div class="max-w-md mx-auto bg-gray-100 min-h-screen">

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
                    <div class="mb-3 text-center">
                        <span class="font-bold text-[14px] mb-1">シリーズ名</span>
                        <p class="text-gray-800">{{ session('series_name', '未設定') }}</p>
                        <span class="font-bold text-[14px] mb-1">キャラクター名</span>
                        <p class="text-gray-800">{{ session('char_name', '未設定') }}</p>
                    </div>
                </div>
                @endif

                <p class="text-base text-gray-700 leading-relaxed">
                    条件がマッチするまで<br>そのままお待ちください。
                </p>
                {{-- リンク --}}

                <div class="p-4">

                    <a href="{{ route('top') }}">
                        <button class="w-full border border-gray-400 text-gray-500 px-4 py-2 rounded hover:bg-gray-100 transition">
                            ホームへ戻る
                        </button>
                    </a>

                </div>
            </div>





        </div>

    </div>
</x-user-layout>