<x-user-layout>
    <div class=" bg-gray-100 flex flex-col justify-between">

        {{-- メインコンテンツ --}}
        <div class="flex flex-col items-center pt-20 px-6 pb-24">

            {{-- 注意アイコン画像 --}}
            <img src="{{ asset('images/ratingsubmit.png') }}"
                alt="注意マーク画像"
                class="w-24 h-24 object-contain mb-6">

            {{-- カード --}}
            <div class="bg-[#FFFFFF] border border-[#FFFFFF] 
                    rounded-[40px] 
                    w-full max-w-md 
                    p-10 text-center shadow-sm">

                <p class="text-lg font-medium mb-4">
                    評価を送信しました
                </p>

                <p class="text-base">
                    評価が完了しました！スムーズな取引をありがとうございました。また素敵な出会いがありますように！
                </p>
            </div>

            {{-- ログインリンク --}}
            <a href="{{ route('top') }}"
                class="mt-10 text-sky-600 font-medium hover:text-sky-700 hover:underline flex items-center gap-1 transition">

                ホームへ戻る
            </a>

        </div>

    </div>

    @isset($e)
    <p>{{$e}}</p>
    @endisset
</x-user-layout>