<x-user-layout>
    <!-- 見出し -->
    <h2 class="text-center text-lg py-4  ">取引完了した商品</h2>

    <div class="grid grid-cols-1 gap-4 px-6 pb-20">
        @forelse($completedItems as $item)
        {{-- 取引完了済みなので、少し透明度を下げて「過去感」を出しています --}}
        <div class="bg-white border border-gray-200 rounded-2xl p-4 shadow-sm flex gap-4 opacity-75">

            {{-- 画像表示 --}}
            <div class="w-24 h-24 flex-shrink-0 bg-gray-100 rounded-xl overflow-hidden grayscale-[20%]">
                @if($item->images->isNotEmpty())
                <img src="{{ asset('storage/'.$item->images->first()->image_url) }}"
                    alt="{{ $item->char_name }}"
                    class="w-full h-full object-cover">
                @else
                <div class="w-full h-full flex items-center justify-center text-[10px] text-gray-400">No Image</div>
                @endif
            </div>

            {{-- シリーズ名/アイテム名 --}}
            <div class="flex-1 flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start">
                        <h3 class="font-bold text-gray-900 text-sm leading-tight">
                            シリーズ: {{ $item->series_name }}
                        </h3>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">キャラ名: {{ $item->char_name }}</p>
                </div>

                <div class="flex justify-between items-end mt-2">
                    {{-- 完了日を表示 --}}
                    <span class="text-[10px] text-gray-400 italic">
                        <i class="fas fa-check-circle mr-1"></i>
                        {{ $item->deleted_at->format('Y/m/d') }} 完了
                    </span>

                </div>
            </div>
        </div>
        @empty
        <div class="text-center py-20">
            <p class="text-gray-400 text-sm">取引完了したアイテムはありません</p>
        </div>
        @endforelse

        {{-- ページネーション --}}
        <div class="mt-4">
            {{ $completedItems->links() }}
        </div>
    </div>
</x-user-layout>