<x-user-layout>

    <form action="{{ route('post.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="bg-white p-6 rounded-lg shadow space-y-4">

        @csrf

        <!-- タイトル -->
        <div class="text-center">
            <h2 class="text-lg font-medium mb-4">出品する</h2>
        </div>

        <!-- 画像 -->
        <div>

            <label class="block mb-2 font-medium">
                画像（1〜4枚）
            </label>
            <div class="grid grid-cols-2 gap-2">

                <input type="file" name="images[]" accept="image/*" class="border p-2 rounded">
                <input type="file" name="images[]" accept="image/*" class="border p-2 rounded">
                <input type="file" name="images[]" accept="image/*" class="border p-2 rounded">
                <input type="file" name="images[]" accept="image/*" class="border p-2 rounded">

            </div>
        </div>

        <!-- hidden -->
        <input type="hidden" name="is_trading" value="0">

        <!-- シリーズ -->
        <div>

            <label class="block text-sm mb-1">
                シリーズ名
            </label>

            <input type="text"
                name="series_name"
                placeholder="シリーズ名"
                class="w-full border rounded px-3 py-2">

        </div>

        <!-- キャラ -->
        <div>

            <label class="block text-sm mb-1">
                キャラ名（必須）
            </label>

            <input type="text"
                name="char_name"
                placeholder="キャラ名 ※必須"
                required
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

        <!-- 交換場所 -->
        <div>

            <label class="block text-sm mb-1">
                交換場所
            </label>

            <select name="exchange_area" class="w-full border rounded px-3 py-2">

                <option value="miyazaki_station">宮崎駅</option>
                <option value="aeon">イオン</option>
                <option value="daie">ダイエー</option>

            </select>

        </div>

        <!-- 求める商品 -->
        <div>

            <label class="block text-sm mb-1">
                求める商品
            </label>

            <textarea
                name="wanted_item"
                placeholder="求める商品"
                class="w-full border rounded px-3 py-2"
                rows="3"></textarea>

        </div>

        <!-- 出品ボタン -->
        <button
            type="submit"
            class="w-full bg-blue-500 text-white py-3 rounded-full font-semibold hover:bg-blue-600">

            出品する

        </button>

    </form>

</x-user-layout>