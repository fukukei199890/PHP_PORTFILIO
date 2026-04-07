<x-user-layout>
    <x-section-title>交換に出す商品</x-section-title>
    <div class="max-w-md mx-auto bg-gray-50 min-h-screen p-4 pb-20">

        <form action="{{ route('goodsselect.select') }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded-2xl shadow-sm space-y-6">

            @csrf
            <input type="hidden" name="item_id" value="{{ $itemId ?? session('current_goods_item_id') }}">


            <div class="space-y-4">
                {{-- シリーズ名：コンポーネント化 --}}
                <div class="space-y-1">
                    <label class="block text-xs font-bold text-gray-400 uppercase ml-2">シリーズ名<span class="ml-1">（必須）</span></label>
                    <x-original-input
                        name="series_name"
                        placeholder="例：ちいかわ お座りぬいぐるみ"
                        required />
                </div>

                {{-- キャラ名：コンポーネント化 --}}
                <div class="space-y-1">
                    <label class="block text-xs font-bold text-gray-400 uppercase ml-2">キャラ名<span class="ml-1">（必須）</span></label>
                    <x-original-input
                        name="char_name"
                        placeholder="例：ハチワレ"
                        required />
                </div>
            </div>

            {{-- 商品状態：ラジオボタンのデザインを他画面と統一 --}}
            <div class="space-y-2">
                <label class="block text-xs font-bold text-gray-400 uppercase ml-2" required>商品状態<span class="ml-1">（必須）</span></label>
                <div class="flex items-center gap-8 py-3 px-5 bg-gray-50 rounded-2xl border border-gray-100">
                    <label class="flex items-center gap-2 cursor-pointer text-sm font-medium text-gray-600" style="font-family: 'Zen Maru Gothic', sans-serif;">
                        <input type="radio" name="is_opened" value="0" checked class="w-4 h-4 text-gray-900 focus:ring-gray-900 border-gray-300">
                        未開封
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer text-sm font-medium text-gray-600" style="font-family: 'Zen Maru Gothic', sans-serif;">
                        <input type="radio" name="is_opened" value="1" class="w-4 h-4 text-gray-900 focus:ring-gray-900 border-gray-300">
                        開封済
                    </label>
                </div>
            </div>

            {{-- ボタンエリア --}}
            <div class="pt-6 space-y-4">
                <x-original-button class="w-full py-4 shadow-sm">
                    次に進む
                </x-original-button>

                <button type="button" onclick="history.back()"
                    class="w-full text-gray-400 text-sm font-bold py-2 hover:text-gray-600 transition"
                    style="font-family: 'Zen Maru Gothic', sans-serif;">
                    キャンセルして戻る
                </button>
            </div>
        </form>
    </div>
</x-user-layout>