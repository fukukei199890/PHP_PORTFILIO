<x-user-layout>

    <div class="max-w-md mx-auto min-h-screen bg-white pb-24">

        {{-- ヘッダー --}}
        <div class="py-8 px-4">
            <h2 class="text-center text-lg font-black  text-gray-900 ">マイページ</h2>
        </div>

        <div class="px-6 mb-10">

            <div class="bg-gray-50 border border-gray-100 rounded-[32px] p-8 text-center shadow-sm">

                <div class="mb-4 inline-flex items-center justify-center w-16 h-16 bg-white rounded-full shadow-sm">
                    <i class="fa-solid fa-user-lock text-gray-300 text-2xl"></i>
                </div>

                <p class="text-sm font-bold text-gray-900 mb-2">ログインが必要です</p>
                <p class="text-[10px] text-gray-400 leading-relaxed mb-8">
                    マイページを利用するにはログイン、<br>または新規会員登録をお願いします。
                </p>

                <div class="flex flex-col gap-3">

                    <a href="{{ route('login') }}"
                        class="block w-full py-4 bg-white border border-gray-200 text-gray-900 rounded-full font-bold text-xs hover:bg-gray-50 transition">
                        ログイン
                    </a>


                    <a href="{{ route('register') }}"
                        class="block w-full py-4 bg-white border border-gray-200 text-gray-900 rounded-full font-bold text-xs hover:bg-gray-50 transition">
                        新規会員登録
                    </a>
                </div>
            </div>
        </div>

        {{-- サポートセクション --}}
        <div class="px-6 space-y-1">
            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em] mb-4 pl-2">
                サポートと規約
            </p>

            <a href="{{ route('manual') }}" class="flex items-center justify-between py-4 px-4 bg-gray-50 rounded-2xl group hover:bg-gray-100 transition-all">
                <span class="text-xs font-bold text-gray-600 group-hover:text-gray-900">使い方を見る</span>
                <i class="fa-solid fa-chevron-right text-[10px] text-gray-300 group-hover:translate-x-1 transition-transform"></i>
            </a>

            <a href="{{ route('agreements') }}" class="flex items-center justify-between py-4 px-4 bg-gray-50 rounded-2xl group hover:bg-gray-100 transition-all">
                <span class="text-xs font-bold text-gray-600 group-hover:text-gray-900">利用規約</span>
                <i class="fa-solid fa-chevron-right text-[10px] text-gray-300 group-hover:translate-x-1 transition-transform"></i>
            </a>

            <a href="{{ route('privacy') }}" class="flex items-center justify-between py-4 px-4 bg-gray-50 rounded-2xl group hover:bg-gray-100 transition-all">
                <span class="text-xs font-bold text-gray-600 group-hover:text-gray-900">プライバシーポリシー</span>
                <i class="fa-solid fa-chevron-right text-[10px] text-gray-300 group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>

        <div class="mt-16 text-center text-[10px] text-gray-300">
            <p>© 2026 MyService. All Rights Reserved.</p>
        </div>
    </div>
</x-user-layout>