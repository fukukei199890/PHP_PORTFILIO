<x-user-layout>

    <!-- 各ページタイトル -->
    <x-section-title>お気に入り商品</x-section-title>


    <div class="grid grid-cols-1 gap-4 px-6 pb-20">
        @forelse($favorite_items as $favorite)
        @php $item = $favorite->listedItem; @endphp

        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden active:bg-gray-50 transition">
            {{-- カード全体をリンクにするための設定 --}}
            <div class="relative">
                <a href="{{ route('goods', $item->id) }}" class="flex items-center gap-4 p-4">
                    {{-- 商品画像 --}}
                    <div class="w-20 h-20 bg-gray-100 rounded-xl flex-shrink-0 overflow-hidden">
                        @if($item->images->first())
                        <img src="{{ asset('storage/'.$item->images->first()->image_url) }}" class="w-full h-full object-cover">
                        @else
                        <div class="flex items-center justify-center h-full text-gray-400 text-[10px]">No Image</div>
                        @endif
                    </div>

                    {{-- 商品情報 --}}
                    <div class="flex-1 min-w-0">
                        <p class="text-[11px] text-gray-500 truncate">シリーズ:{{ $item->series_name }}</p>
                        <p class="text-[11px] text-gray-500 truncate">アイテム名:{{ $item->char_name }}</p>

                        <div class="flex items-center text-gray-400 mt-2">
                            <span class="text-[10px] italic">交換場所: {{ $item->exchange_area_label }}</span>
                        </div>
                    </div>

                    {{-- 矢印アイコン --}}
                    <div class="text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="9 5l7 7-7 7" />
                        </svg>
                    </div>
                </a>

                {{-- 解除ボタン：リンクの上に重ならないよう、絶対配置またはフォームとして独立 --}}
                <div class="px-4 pb-3 flex justify-end">
                    <form action="{{ route('favorites.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-[11px] font-bold text-gray-400 border border-gray-300 px-3 py-1 rounded-lg hover:bg-red-50 hover:text-red-400 hover:border-red-200 transition relative z-10">
                            解除
                        </button>
                    </form>
                </div>
            </div>
        </div>

        @empty
        <div class="text-center py-20 text-gray-500">
            <p class="text-sm">お気に入りした商品はまだありません。</p>
            <a href="{{ route('top') }}" class="text-indigo-500 text-xs underline mt-2 inline-block">商品を探しに行く</a>
        </div>
        @endforelse
    </div>
</x-user-layout>