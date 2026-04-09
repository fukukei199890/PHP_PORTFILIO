<x-user-layout>
    <x-section-title>商品詳細</x-section-title>
    <div class="max-w-md mx-auto bg-white min-h-screen pb-20">

        {{-- 画像セクション --}}
        <div class="bg-gray-50/50 border-b border-gray-100 relative">
            @if($item->images->count() > 0)
            <div class="relative group">
                {{-- 横スクロールコンテナ --}}
                <div class="flex overflow-x-auto snap-x snap-mandatory scrollbar-hide">
                    @foreach($item->images as $image)
                    <div class="flex-none w-full snap-center py-10 text-center">
                        <div class="inline-block relative">
                            <img src="{{ asset('storage/'.$image->image_url) }}"
                                class="mx-auto w-64 h-64 object-cover rounded-2xl shadow-md border-4 border-white">
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- 枚数インジケーター (複数枚ある場合のみ表示) --}}
                @if($item->images->count() > 1)
                <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-1.5">
                    @foreach($item->images as $index => $image)
                    <div class="w-1.5 h-1.5 rounded-full bg-gray-300"></div>
                    @endforeach
                </div>
                @endif

                {{-- お気に入りボタン (画像コンテナに対して絶対配置) --}}
                <form action="{{ route('favorites.store',$item->id) }}" method="POST" class="absolute bottom-6 right-10 z-10">
                    @csrf
                    <button type="submit" class="bg-white p-3 rounded-full shadow-lg hover:scale-110 transition text-red-400 border border-gray-100">
                        <span class="text-2xl">♥</span>
                    </button>
                </form>
            </div>
            @endif
        </div>


        {{-- 2. 出品者情報 --}}
        <div class="flex items-center gap-4 p-6 bg-white border-b border-gray-50">
            {{-- デバッグ用：中身が何か確認する --}}

            <img src="{{ asset($item->user->icon_url ?: 'images/default-icon.png') }}"
                class="w-14 h-14 rounded-full object-cover border border-gray-200">
            <div>
                <p class="text-xs text-gray-400 font-bold mb-1" style="font-family: 'Zen Maru Gothic', sans-serif;">出品者</p>
                <p class="text-base font-bold text-gray-800" style="font-family: 'Zen Maru Gothic', sans-serif;">
                    {{ $item->user->name ?? '出品者' }}
                </p>
            </div>
        </div>

        {{-- 3アイテム情報 --}}
        <div class="p-6 space-y-6">

            <div class="space-y-5"> {{-- 間隔を広げた --}}
                <div class="flex justify-between items-center border-b border-gray-50 pb-3">
                    <span class="text-sm text-gray-500 font-bold" style="font-family: 'Zen Maru Gothic', sans-serif;">シリーズ名</span>
                    <span class="text-base font-bold text-gray-900">{{ $item->series_name }}</span>
                </div>

                <div class="flex justify-between items-center border-b border-gray-50 pb-3">
                    <span class="text-sm text-gray-500 font-bold" style="font-family: 'Zen Maru Gothic', sans-serif;">キャラ名</span>
                    <span class="text-base font-bold text-gray-900">{{ $item->char_name }}</span>
                </div>

                <div class="flex justify-between items-center border-b border-gray-50 pb-3">
                    <span class="text-sm text-gray-500 font-bold" style="font-family: 'Zen Maru Gothic', sans-serif;">状態</span>
                    <span class="px-4 py-1 bg-gray-900 rounded-full text-xs text-white font-bold">
                        {{ $item->is_opened ? '開封済み' : '未開封' }}
                    </span>
                </div>

                <div class="flex justify-between items-center border-b border-gray-50 pb-3">
                    <span class="text-sm text-gray-500 font-bold" style="font-family: 'Zen Maru Gothic', sans-serif;">交換場所</span>
                    <span class="text-base font-bold text-gray-900">{{ $item->exchange_area_label }}</span>
                </div>
            </div>

            {{-- 求める条件 --}}
            <div class="mt-8 p-6 bg-gray-100/80 rounded-[2rem] border border-gray-200">
                <p class="text-xs text-gray-500 font-bold mb-3 uppercase tracking-wider">求める商品・条件</p>
                <p class="text-base text-gray-800 leading-relaxed font-medium">{{ $item->request_message }}</p>
            </div>

            {{-- 4. アクションボタン --}}
            <div class="pt-6 space-y-4 text-center">

                <form method="post" action="{{ route('goods.select') }}">
                    @csrf
                    <input type="hidden" name="listed_item_id" value="{{ $item->id }}">
                    <x-original-button class="w-full py-4 shadow-xl">
                        @auth
                        交換する商品を選択する
                        @endauth
                        @guest
                        ログインして申し込む
                        @endguest
                    </x-original-button>
                </form>

                <a href="{{ route('top') }}" class="block text-sm text-gray-400 font-bold hover:text-gray-600 transition pt-2" style="font-family: 'Zen Maru Gothic', sans-serif;">
                    ホームへ戻る
                </a>
            </div>
        </div>
    </div>
</x-user-layout>