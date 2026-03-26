<x-user-layout>
    <div class="max-w-2xl mx-auto py-8 px-4">
        <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
            <h2 class="text-center text-lg py-4 border-b text-gray-900 ">交換申請</h2>

            <div class="mb-6 p-4 bg-gray-50 rounded-lg border">
                <p class="text-sm font-bold text-gray-500">申請アイテム情報</p>
                @isset($result['current_series_name'])
                <p class="text-sm text-gray-600">シリーズ名:{{ $result['current_series_name'] }}</p>
                @endisset

                @isset($result['current_char_name'])
                <p class="text-sm text-gray-600">アイテム名:{{ $result['current_char_name'] }}</p>
                @endisset

                <p class="text-sm text-gray-600">状態:{{ ($result['current_is_opened'] ?? 0) == 0 ? '未開封' : '開封' }}</p>
            </div>

            {{-- フォームはここから一つにまとめます --}}
            <form action="{{ route('request.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- IDなどの隠しデータ --}}
                <input type="hidden" name="listed_item_id" value="{{ $result['item_id'] }}">

                <div class="mb-6">
                    <label class="block mb-2 font-medium text-sm text-gray-700">
                        提示商品の画像
                    </label>
                    <div class="grid grid-cols-1 gap-2">
                        {{-- name="image" が重要 --}}
                        <input type="file" name="image" accept="image/*"
                            class="border p-2 rounded w-full bg-gray-50" required>
                    </div>
                </div>

                <p class="text-sm text-gray-600 mb-4">
                    トレード相手に送るメッセージを入力してください。
                </p>

                <div class="mb-6">
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                        申請内容 / メッセージ
                    </label>
                    <textarea id="message" name="request_message" rows="5"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-3 bg-gray-50"
                        placeholder="例：こちらのアイテムと交換をお願いしたいです。よろしくお願いします。" required></textarea>
                </div>


                <div class="pt-8 space-y-4">
                    <button type="submit"
                        class="w-full bg-blue-500 text-white py-4 rounded-xl font-bold hover:bg-blue-600 shadow-md active:scale-[0.98] transition-all">
                        申請を送信する
                    </button>

                </div>
            </form>
            {{-- フォームはここまで --}}

        </div>
    </div>
</x-user-layout>