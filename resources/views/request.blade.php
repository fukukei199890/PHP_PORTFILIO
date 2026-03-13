<x-user-layout>



    <div class="max-w-2xl mx-auto py-8 px-4">
        <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">
                交換申請
            </h2>


            <div class="mb-6 p-4 bg-gray-50 rounded-lg border">
                <p class="text-sm font-bold text-gray-500">申請アイテム情報</p>
                @isset($result->series_name)
                <p class="text-sm text-gray-600">シリーズ名:{{ $result->series_name }}</p>
                @else

                @endisset
                @isset($result->char_name)
                <p class="text-sm text-gray-600">アイテム:名{{ $result->char_name }}</p>
                @else

                @endisset
                @if($result->is_opened==0)
                <!-- 未開封のとき -->
                <p class="text-sm text-gray-600">状態:未開封</p>
                @else
                <!-- 開封済みのとき -->
                <p class="text-sm text-gray-600">状態:開封</p>
                @endif
            </div>

            <form action="{{ route('goods.select') }}" method="post">
                @csrf
                <input type="hidden" name="listed_item_id" value="$item->id">
                <!-- 画像 -->
                <div>
                    <label class="block mb-2 font-medium">
                        画像
                    </label>

                    <div class="grid grid-cols-2 gap-2">
                        <input type="file" name="image" accept="image/*" class="border p-2 rounded">
                    </div>
                </div>

                <p class="text-sm text-gray-600 mb-4">
                    トレード相手に送るメッセージを入力してください。
                </p>

                <form method="POST" action="{{ route('request.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-6">
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                            申請内容 / メッセージ
                        </label>
                        <textarea
                            id="message"
                            name="message"
                            rows="5"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-3 bg-gray-50"
                            placeholder="例：こちらのアイテムと交換をお願いしたいです。よろしくお願いします。"
                            required></textarea>
                    </div>

                    <div class="flex justify-end gap-4">
                        <button type="button" onclick="history.back()" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition">
                            戻る
                        </button>
                        <button type="submit" class="px-6 py-2 bg-indigo-600 text-white font-bold rounded-md hover:bg-indigo-700 transition shadow-sm">
                            申請を送信する
                        </button>
                    </div>
                </form>
        </div>
    </div>
</x-user-layout>