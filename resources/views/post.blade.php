<x-user-layout>
    <div class="max-w-md mx-auto bg-gray-100 min-h-screen">

        <form action="{{ route('post.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="bg-white p-6 rounded-lg shadow space-y-4">

            @csrf

            <x-section-title>出品する</x-section-title>


            <div>
                <label class="block mb-2 italic text-lg font-bold">
                    画像（1〜4枚）<span class="text-red-500 text-xs">※1枚目は必須</span>
                </label>
                <div>
                    <input type="file" name="images[]" accept="image/*" class="border p-2 rounded" required>
                    <input type="file" name="images[]" accept="image/*" class="border p-2 rounded">
                    <input type="file" name="images[]" accept="image/*" class="border p-2 rounded">
                    <input type="file" name="images[]" accept="image/*" class="border p-2 rounded">
                </div>
            </div>

            <input type="hidden" name="is_trading" value="0">

            <div>
                <label class="block mb-1 italic text-lg font-bold">
                    シリーズ名
                </label>

                <input type="text"
                    name="series_name"
                    placeholder="例：ちいかわ お座りぬいぐるみ"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block mb-1 italic text-lg font-bold">
                    キャラ名（必須）
                </label>

                <input type="text"
                    name="char_name"
                    placeholder="例:ちいかわ"
                    required
                    class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block mb-1 italic text-lg font-bold">
                    商品状態
                </label>

                <div class="flex items-center gap-6">
                    <label class="flex items-center gap-2">
                        <input type="radio" name="is_opened" value="0" required>
                        未開封
                    </label>

                    <label class="flex items-center gap-2">
                        <input type="radio" name="is_opened" value="1" required>
                        開封済
                    </label>
                </div>
            </div>

            <div>
                <label class="block mb-1 italic text-lg font-bold">
                    主な交換希望場所
                </label>

                <select name="exchange_area" class="w-full border rounded px-3 py-2 text-gray-700 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">選択してください</option>
                    <option value="miyazaki_station">宮崎駅</option>
                    <option value="miyako_city">南宮崎駅・宮交シティ</option>
                    <option value="aeon">イオンモール宮崎</option>
                    <option value="carino">カリーノ宮崎（旧ダイエー）</option>
                    <option value="other">その他（チャットで相談）</option>
                </select>
            </div>

            <div>
                <label class="block mb-1 italic text-lg font-bold">
                    探しているキャラ・条件
                </label>

                <textarea
                    name="request_message"
                    placeholder="例：同シリーズのうさぎを探しています。仕事終わりの18時以降に駅前で交換希望です。"
                    class="w-full border rounded px-3 py-2"
                    rows="3">
                </textarea>
            </div>

            <x-original-button>出品する</x-original-button>

        </form>
    </div>
</x-user-layout>