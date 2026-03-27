<x-user-layout>
    <div class="max-w-md mx-auto bg-gray-50 min-h-screen p-4">

        <form action="{{ route('goodsselect.select') }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded-2xl shadow-sm space-y-6">

            @csrf
            <input type="hidden" name="item_id" value="{{ $itemId }}">


            <!-- 各ページタイトル -->
            <x-section-title>交換に出す商品</x-section-title>


            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-gray-400 mb-1 uppercase">シリーズ名</label>
                    <input type="text" name="series_name" placeholder="ちいかわ お座りぬいぐるみ"
                        class="w-full border-gray-200 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 mb-1 uppercase">キャラ名（必須）</label>
                    <input type="text" name="char_name" placeholder="ハチワレ" required
                        class="w-full border-gray-200 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 mb-2 uppercase">商品状態</label>
                <div class="flex items-center gap-6 text-gray-600">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="is_opened" value="0" checked class="text-blue-500 focus:ring-blue-500">
                        <span class="text-sm">未開封</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="is_opened" value="1" class="text-blue-500 focus:ring-blue-500">
                        <span class="text-sm">開封済</span>
                    </label>
                </div>
            </div>

            <div class="pt-6 space-y-3">
                <x-original-button class="w-auto px-10">
                    次に進む
                </x-original-button>

                <button type="button" onclick="history.back()"
                    class="w-full border border-gray-400 text-gray-500 px-4 py-2 rounded hover:bg-gray-100 transition">
                    キャンセルして戻る
                </button>

            </div>
        </form>
    </div>
</x-user-layout>