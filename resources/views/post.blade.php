<x-user-layout>
    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data"
        class="bg-white p-6 rounded-lg shadow space-y-4">

        @csrf

        <!-- 画像 -->
        <div class="text-center">
            <h2 class="text-lg font-medium mb-4">出品する</h2>

            <label class="block mb-2 font-medium">
                画像（1〜4枚）
            </label>

            <input type="file" name="image1" class="mb-2">
            <input type="file" name="image2" class="mb-2">
            <input type="file" name="image3" class="mb-2">
            <input type="file" name="image4">

        </div>

        <!-- シリーズ -->
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="is_trading" value="0">

        <div>
            <input type="text"
                name="series_name"
                placeholder="シリーズ名"
                class="w-full border rounded px-3 py-2">
        </div>

        <!-- キャラ -->
        <div>
            <input type="text"
                name="char_name"
                placeholder="キャラ名 ※必須"
                required
                class="w-full border rounded px-3 py-2">
        </div>

        <!-- 状態 -->
        <div class="flex items-center gap-6">

            <label class="flex items-center gap-2">
                <input type="radio" name="is_opened" value="0">
                未開封
            </label>

            <label class="flex items-center gap-2">
                <input type="radio" name="is_opened" value="1">
                開封済
            </label>

            <div>

                <select name="exchange_area">
                    <option value="miyazaki_station">宮崎駅</option>
                    <option value="aeon">イオン</option>
                    <option value="daie">ダイエー</option>

                </select>
            </div>

        </div>

        <!-- 求める商品 -->
        <div>

            <textarea
                name="wanted_item"
                placeholder="求める商品"
                class="w-full border rounded px-3 py-2"></textarea>

        </div>

        <!-- 出品ボタン -->
        <button
            type="submit"
            class="w-full bg-blue-500 text-white py-3 rounded-full font-semibold hover:bg-pink-600">

            出品する

        </button>

    </form>
</x-user-layout>