<x-user-layout>
    <div class="grid grid-cols-1 gap-4 px-6 pb-20">
        <!-- 見出し -->
        <h2 class="text-center text-lg py-4  ">出品中の商品</h2>
        @forelse($items as $item)
        <div class="bg-white border border-gray-200 rounded-2xl p-4 shadow-sm flex gap-4">
            {{-- 画像表示 --}}
            <div class="w-24 h-24 flex-shrink-0 bg-gray-100 rounded-xl overflow-hidden">
                @if($item->images->isNotEmpty())
                {{-- 最初の1枚目の image_url を表示 --}}
                <img src="{{ asset('storage/'.$item->images->first()->image_url) }}"
                    alt="{{ $item->char_name }}"
                    class="w-full h-full object-cover">
                @else
                {{-- 画像がない場合のダミー --}}
                <div class="w-full h-full flex items-center justify-center text-[10px] text-gray-400">No Image</div>
                @endif
            </div>
            {{-- シリーズ名/アイテム名 --}}
            <div class="flex-1 flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start">
                        <h3 class="font-bold text-gray-900 text-sm leading-tight">シリーズ名:{{ $item->series_name }}</h3>

                    </div>
                    <p class="text-xs text-gray-500 mt-1">キャラ名:{{ $item->char_name }}</p>
                </div>

                <div class="flex justify-between items-end mt-2">
                    <span class="text-[10px] text-gray-400 italic">
                        <i class="fas fa-map-marker-alt mr-1"></i>{{ $item->exchange_area }}
                    </span>

                    <form action="{{ route('listing.destroy', $item->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-xs font-bold text-red-600 border border-red-600 px-3 py-1 rounded-lg hover:bg-red-50 transition">
                            削除
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="text-center py-20">
            <p class="text-gray-400 text-sm">出品中のアイテムはありません</p>
        </div>
        @endforelse
    </div>
</x-user-layout>