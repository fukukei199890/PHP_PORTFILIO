<x-user-layout>
    <x-section-title>出品する</x-section-title>
    <div class="max-w-md mx-auto bg-gray-50 min-h-screen pb-20">

        <form action="{{ route('post.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="bg-white p-6 space-y-6">

            @csrf



            {{-- 画像選択 --}}
            <div class="space-y-2">
                <label class="block text-sm font-bold text-gray-700" style="font-family: 'Zen Maru Gothic', sans-serif;">
                    画像（1〜4枚）<span class="text-red-500 text-[10px] ml-1">※1枚目は必須</span>
                </label>
                <div class="grid grid-cols-1 gap-2">
                    {{-- file typeはデザインが特殊なため、一旦そのままか、専用コンポーネントにするのが一般的です --}}
                    <input type="file" name="images[]" accept="image/*" class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200" required>
                    <input type="file" name="images[]" accept="image/*" class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                    <input type="file" name="images[]" accept="image/*" class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                    <input type="file" name="images[]" accept="image/*" class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                </div>
            </div>

            <input type="hidden" name="is_trading" value="0">

            {{-- シリーズ名 --}}
            <div class="space-y-1">
                <label class="block text-sm font-bold text-gray-700">シリーズ名<span class="ml-1">（必須）</span></label>
                <x-original-input
                    name="series_name"
                    placeholder="例：ちいかわ お座りぬいぐるみ"
                    required />
            </div>

            {{-- キャラ名 --}}
            <div class="space-y-1">
                <label class="block text-sm font-bold text-gray-700">
                    キャラ名<span class=" ml-1">（必須）</span>
                </label>
                <x-original-input
                    name="char_name"
                    placeholder="例:ちいかわ"
                    required />
            </div>

            {{-- 商品状態 --}}
            <div class="space-y-2">
                <label class="block text-sm font-bold text-gray-700">商品状態<span class=" ml-1">（必須）</span></label>
                <div class="flex items-center gap-8 py-3 px-5 bg-gray-50 rounded-2xl border border-gray-100">
                    <label class="flex items-center gap-2 cursor-pointer text-sm font-medium text-gray-600">
                        <input type="radio" name="is_opened" value="0" class="w-4 h-4 text-gray-900 focus:ring-gray-900 border-gray-300" required>
                        未開封
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer text-sm font-medium text-gray-600">
                        <input type="radio" name="is_opened" value="1" class="w-4 h-4 text-gray-900 focus:ring-gray-900 border-gray-300" required>
                        開封済
                    </label>
                </div>
            </div>

            {{-- 交換希望場所 --}}
            <div class="space-y-1">
                <label class="block text-sm font-bold text-gray-700">主な交換希望場所<span class="ml-1">（必須）</span></label>
                {{-- selectはデザインが複雑なため一旦現状維持、または後でコンポーネント化 --}}
                <select name="exchange_area" class="w-full bg-white rounded-full border border-gray-200 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 text-sm py-2 px-5 outline-none appearance-none cursor-pointer" required>
                    <option value="">選択してください</option>
                    <option value="miyazaki_station">宮崎駅</option>
                    <option value="miyako_city">南宮崎駅・宮交シティ</option>
                    <option value="aeon">イオンモール宮崎</option>
                    <option value="carino">カリーノ宮崎（旧ダイエー）</option>
                    <option value="other">その他（チャットで相談）</option>
                </select>
            </div>

            <div class="space-y-1">
                <label class="block text-sm font-bold text-gray-700">詳細な条件<span class=" ml-1">（必須）</span></label>
                <x-original-textarea
                    name="request_message"
                    rows="3"
                    placeholder="細かく書くと相手が見つかりやすいです。" required></x-original-textarea>
            </div>

            {{-- 探しているキャラ・条件 --}}
            <div class="space-y-1">
                <label class="block text-sm font-bold text-gray-700">探しているキャラ・条件<span class=" ml-1">（必須）</span></label>
                <x-original-textarea
                    name="request_message"
                    rows="3"
                    placeholder="例：同シリーズのうさぎを探しています。仕事終わりの18時以降に駅前で交換希望です。" required></x-original-textarea>
            </div>

            <div class="pt-4">
                <x-original-button class="w-full">出品する</x-original-button>
            </div>

        </form>
    </div>
</x-user-layout>