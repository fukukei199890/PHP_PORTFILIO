<x-user-layout>

    <form action="{{ route('request') }}"
        method="POST"
        enctype="multipart/form-data"
        class="bg-white p-6 rounded-lg shadow space-y-4">

        @csrf



        <!-- タイトル -->
        <div class="text-center">
            <h2 class="text-lg font-medium mb-4">選択する</h2>
        </div>

        <!-- 画像 -->
        <div>
            <label class="block mb-2 font-medium">
                画像
            </label>

            <div class="grid grid-cols-2 gap-2">
                <input type="file" name="image" accept="image/*" class="border p-2 rounded">
            </div>
        </div>

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

        <!-- 出品ボタン -->

        <div class="flex justify-end gap-4">
            <button type="button" onclick="history.back()" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition">
                戻る
            </button>

            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white font-bold rounded-md hover:bg-indigo-700 transition shadow-sm">
                リクエスト申請ページに移動
            </button>
            </a>
        </div>
    </form>

</x-user-layout>