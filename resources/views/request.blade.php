<x-user-layout>
    <div class="max-w-md mx-auto bg-gray-50 min-h-screen pb-20">

        {{-- コンテナ全体を白背景・角丸に --}}
        <div class="bg-white min-h-screen shadow-sm p-6 space-y-8">

            <x-section-title>交換申請</x-section-title>

            {{-- 申請先アイテムの情報：--}}
            <div class="p-5 bg-gray-50 rounded-[24px] border border-gray-100 space-y-2">
                <p class="text-[12px] font-bold text-gray-700 uppercase tracking-widest mb-1">交換を申し込むアイテム</p>

                @isset($result['current_series_name'])
                <p class="text-base font-bold text-gray-800">
                    シリーズ名:{{ $result['current_series_name'] }}
                </p>
                @endisset

                <div class="flex items-center gap-4">
                    @isset($result['current_char_name'])
                    <p class="text-base text-gray-600">
                        キャラ名: {{ $result['current_char_name'] }}
                    </p>
                    @endisset
                    <p class="text-[10px] px-2 py-0.5 bg-white border border-gray-200 rounded-full text-gray-500">
                        {{ ($result['current_is_opened'] ?? 0) == 0 ? '未開封' : '開封済み' }}
                    </p>
                </div>
            </div>

            <form action="{{ route('request.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                <input type="hidden" name="listed_item_id" value="{{ $result['item_id'] }}">

                {{-- 画像アップロード --}}
                <div class="space-y-3">
                    <label class="block text-sm font-bold text-gray-700">
                        提示商品の画像<span class="ml-1">（必須）</span>
                    </label>
                    <div class="grid grid-cols-1">
                        <input type="file" name="image" accept="image/*"
                            class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200" required>
                    </div>
                </div>

                {{-- メッセージ入力：コンポーネント化 --}}
                <div class="space-y-3">
                    <div class="space-y-1">
                        <label for="message" class="block text-sm font-bold text-gray-700" required>
                            申請内容 / メッセージ<span class="ml-1">（必須）</span>
                        </label>

                    </div>

                    <x-original-textarea
                        id="message"
                        name="request_message"
                        rows="5"
                        placeholder="例：こちらのアイテムと交換をお願いしたいです。ご検討よろしくお願いします。"
                        required></x-original-textarea>
                </div>

                <div class="pt-4">
                    <x-original-button class="w-full py-4 shadow-sm">
                        申請を送信する
                    </x-original-button>
                </div>
            </form>

        </div>
    </div>
</x-user-layout>