<x-user-layout>
    <div class="max-w-2xl mx-auto py-8 px-4">
        <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">
                交換申請
            </h2>

            <p class="text-sm text-gray-600 mb-4">
                トレード相手に送るメッセージを入力してください。
            </p>

            <form method="POST" action="" enctype="multipart/form-data">
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

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        参考画像（任意）
                    </label>
                    <input type="file" name="images" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
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