<x-user-layout>
    <x-section-title>商品詳細</x-section-title>
    <div class="max-w-md mx-auto bg-white min-h-screen pb-20">


        {{-- 画像 --}}
        <div class="py-10 text-center bg-gray-50/50 border-b border-gray-100 relative">
            @if($item->images->first())
            <div class="inline-block relative">
                <img src="{{ asset('storage/'.$item->images->first()->image_url) }}"
                    class="mx-auto w-40 h-40 object-cover rounded-2xl shadow-md border-4 border-white">

                {{-- お気に入りボタンを大きく、押しやすく --}}
                <form action="{{ route('favorites.store',$item->id) }}" method="POST" class="absolute -bottom-3 -right-3">
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
            <img src="{{ $item->user->icon_url ?: asset('images/default-icon.png') }}"
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
                @auth
                <form method="post" action="{{ route('goods.select') }}">
                    @csrf
                    <input type="hidden" name="listed_item_id" value="{{ $item->id }}">
                    <x-original-button class="w-full py-4 shadow-xl">
                        交換する商品を選択する
                    </x-original-button>
                </form>
                @endauth

                @guest
                <a href="{{ route('login') }}" class="block">
                    <x-original-button class="w-full py-4 shadow-xl">
                        ログインして申し込む
                    </x-original-button>
                </a>
                @endguest

                <a href="{{ route('top') }}" class="block text-sm text-gray-400 font-bold hover:text-gray-600 transition pt-2" style="font-family: 'Zen Maru Gothic', sans-serif;">
                    ホームへ戻る
                </a>
            </div>
        </div>
    </div>
</x-user-layout>