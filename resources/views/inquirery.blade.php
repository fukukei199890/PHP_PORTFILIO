<x-user-layout>
    <div class="max-w-md mx-auto px-6 py-12 text-gray-800">

        <!-- 見出し -->
        <h2 class="text-center text-lg py-4 border-b text-gray-900 ">お問い合わせ</h2>


        {{-- 案内文 --}}
        <div class="text-sm space-y-4 mb-10 leading-relaxed text-gray-600">
            <p>サービスに関するご質問・ご相談は、以下のフォームよりご連絡ください。</p>
            <p class="text-xs">
                ※通常2〜3営業日以内にご返信いたします。<br>
                ※内容によっては回答いたしかねる場合がございます。
            </p>
        </div>

        {{-- フォーム --}}
        <form method="POST" action="#" class="space-y-8">
            @csrf
            <div>
                <label for="message" class="block text-sm font-bold mb-3">お問い合わせ内容</label>
                <textarea
                    id="message"
                    name="message"
                    rows="6"
                    required
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all"
                    placeholder="内容を入力してください"></textarea>
            </div>

            <div class="flex justify-center">
                <button type="submit"
                    class="w-full bg-blue-600 text-white font-bold py-3.5 rounded-full hover:bg-blue-700 transition-colors">
                    送信する
                </button>
            </div>
        </form>
    </div>
</x-user-layout>