<x-user-layout>
    <div class="max-w-md mx-auto min-h-screen bg-white pb-24">
        <!-- 各ページタイトル -->
        <x-section-title>マイページ</x-section-title>

        {{-- プロフィールセクション --}}
        <div class="px-6 mb-8">
            <div class="bg-gray-50 border border-gray-100 rounded-[32px] p-6 shadow-sm">
                <form action="{{ route('profile.update_icon') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="flex items-center gap-5 mb-6">
                        {{-- アイコン --}}
                        <div class="relative shrink-0">
                            <img src="{{ Auth::user()->icon_url ?: asset('images/default-icon.png') }}" alt="ユーザーアイコン"
                                class="w-20 h-20 rounded-full object-cover border-2 border-white shadow-sm bg-gray-200">
                        </div>

                        {{-- ユーザー名・スコア --}}
                        <div class="flex-1">
                            <p class="text-xl font-black text-gray-900">{{ Auth::user()->name }}</p>
                            <div class="flex items-center gap-1 mt-1">
                                <span class="text-sm font-bold text-gray-400 italic">評価</span>
                                <span class="text-lg font-black text-gray-900">★{{ $score }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- アイコン更新エリア --}}
                    <div class="border-t border-gray-200 pt-4 mt-2">
                        <label
                            class="block text-[10px] font-bold text-gray-400 uppercase tracking-tighter mb-2">アイコンを更新する</label>
                        <div class="flex items-center gap-2">
                            <input type="file" name="icon"
                                class="block w-full text-[10px] text-gray-500
                                        file:mr-3 file:px-3 file:py-1.5
                                        file:rounded-full file:border file:border-gray-300
                                        file:bg-white file:text-gray-700 file:text-[10px] file:font-bold
                                        hover:file:bg-gray-50" />

                            <button type="submit"
                                class="shrink-0 bg-blue-600 text-white text-[10px] font-bold px-4 py-2 rounded-full transition">
                                更新
                            </button>
                        </div>
                        @error('icon')
                        <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p>
                        @enderror
                    </div>
                </form>
            </div>
        </div>

        {{-- プロフィール編集ボタン --}}
        <div class="px-6 mb-10">
            <a href="{{ route('profile.edit') }}"
                class="block w-full text-center py-4 bg-white border border-gray-900 text-gray-900 rounded-full font-bold text-sm hover:bg-gray-50 transition shadow-sm">
                プロフィールを編集する
            </a>
        </div>

        {{-- ステータス別ボタン（グリッド） --}}
        <div class="grid grid-cols-2 gap-3 px-6 mb-10">
            {{-- 出品中ボタン --}}
            <a href="{{ route('listing') }}"
                class="bg-white border border-gray-900 text-gray-900 text-center py-5 rounded-2xl text-sm font-bold hover:bg-gray-50 transition shadow-sm flex flex-col items-center gap-1">
                <span class="text-xs text-gray-400 font-normal italic"></span>
                出品中
            </a>

            {{-- 取引完了ボタン --}}
            <a href="{{ route('itemcomplete') }}"
                class="bg-white border border-gray-900 text-gray-900 text-center py-5 rounded-2xl text-sm font-bold hover:bg-gray-50 transition shadow-sm flex flex-col items-center gap-1">
                <span class="text-xs text-gray-400 font-normal italic"></span>
                取引完了
            </a>
        </div>

        {{-- メニューリスト --}}
        <div class="px-4 border-t border-gray-100">

            <a href="{{ route('manual') }}"
                class="flex items-center justify-between py-5 border-b border-gray-50 px-4 hover:bg-gray-50 group">
                <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">使い方を見る</span>
                <i class="fa-solid fa-chevron-right text-xs text-gray-300 group-hover:text-gray-900"></i>
            </a>

            <a href="{{ route('favorite') }}"
                class="flex items-center justify-between py-5 border-b border-gray-50 px-4 hover:bg-gray-50 group">
                <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">お気に入り登録した商品</span>
                <i class="fa-solid fa-chevron-right text-xs text-gray-300 group-hover:text-gray-900"></i>
            </a>
            <a href="{{ route('agreements') }}"
                class="flex items-center justify-between py-5 border-b border-gray-50 px-4 hover:bg-gray-50 group">
                <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">利用規約</span>
                <i class="fa-solid fa-chevron-right text-xs text-gray-300 group-hover:text-gray-900"></i>
            </a>
            <a href="{{ route('privacy') }}"
                class="flex items-center justify-between py-5 border-b border-gray-50 px-4 hover:bg-gray-50 group">
                <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">プライバシーポリシー</span>
                <i class="fa-solid fa-chevron-right text-xs text-gray-300 group-hover:text-gray-900"></i>
            </a>
            <a href="{{ route('inquirery') }}"
                class="flex items-center justify-between py-5 border-b border-gray-50 px-4 hover:bg-gray-50 group">
                <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">お問い合わせ</span>
                <i class="fa-solid fa-chevron-right text-xs text-gray-300 group-hover:text-gray-900"></i>
            </a>
        </div>
        {{-- ログアウト --}}
        <div class="mt-12 px-10">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-original-button color="black" class="w-auto px-10">
                    ログアウト
                </x-original-button>

            </form>
        </div>
        {{-- copyright --}}

        <div class="mt-16 text-center text-[10px] text-gray-300">
            <p>© 2026 MyService. All Rights Reserved.</p>
        </div>
    </div>

    {{-- 佐藤のテスト用ページへのリンク --}}
    <a href="{{ route('satoTest') }}">佐藤のテスト用ページへのリンク</a>
</x-user-layout>