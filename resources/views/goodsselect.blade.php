<x-user-layout>
    <div class="max-w-md mx-auto bg-white min-h-screen shadow-sm">
        <form action="{{ route('goodsselect.select') }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded-lg shadow space-y-4">

            @csrf

            <input type="hidden" name="item_id" value="{{ $itemId }}">

            <!-- 見出し -->
            <h2 class="text-center text-lg py-4 border-b text-gray-900 ">交換に出す商品</h2>

            <!-- シリーズ -->
            <div>
                <label class="block text-sm mb-1">
                    シリーズ名
                </label>

                <input type="text" name="series_name" placeholder="ちいかわ お座りぬいぐるみ" class="w-full border rounded px-3 py-2">
            </div>

            <!-- キャラ -->
            <div>
                <label class="block text-sm mb-1">
                    キャラ名（必須）
                </label>

                <input type="text" name="char_name" placeholder="ハチワレ" required
                    class="w-full border rounded px-3 py-2">
            </div>

            <!-- 状態 -->
            <div>
                <label class="block text-sm mb-2">
                    商品状態
                </label>

                <div class="flex items-center gap-6">

                    <label class="flex items-center gap-2">
                        <input type="radio" name="is_opened" value="0">
                        未開封
                    </label>

                    <label class="flex items-center gap-2">
                        <input type="radio" name="is_opened" value="1">
                        開封済
                    </label>

                </div>
            </div>

            <!-- 出品ボタン -->

            <div class="pt-8 space-y-4">
                <button type="submit"
                    class="w-full bg-blue-500 text-white py-4 rounded-xl font-bold hover:bg-blue-600 shadow-md active:scale-[0.98] transition-all">
                    次へ進む
                </button>

                <button type="button" onclick="history.back()"
                    class="w-full text-gray-400 text-sm font-medium hover:text-gray-600 transition-colors">
                    キャンセルして戻る
                </button>
            </div>
        </form>
    </div>
</x-user-layout>