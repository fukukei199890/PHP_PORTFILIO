<x-user-layout>
    <div class="max-w-md mx-auto px-6 py-12 text-gray-800">
        {{-- 完了メッセージの表示 --}}
        @if (session('status'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
            {{ session('status') }}
        </div>
        @endif


        <!-- 各ページタイトル -->
        <x-section-title>お問い合わせ</x-section-title>



        {{-- 案内文 --}}
        <div class="text-sm space-y-4 mb-10 leading-relaxed text-gray-600">
            <p>サービスに関するご質問・ご相談は、以下のフォームよりご連絡ください。</p>
            <p class="text-xs">
                ※通常2〜3営業日以内にご返信いたします。<br>
                ※内容によっては回答いたしかねる場合がございます。
            </p>
        </div>

        {{-- フォーム --}}
        <form method="POST" action="route{{ ('inquiry.store') }}" class="space-y-8">
            @csrf
            {{-- name, email, subject などを追加する例 --}}
            <div>
                <label for="name" class="block text-sm font-bold mb-3">お名前</label>
                <input type="text" name="name" id="name" required class="..." value="{{ old('name') }}">
            </div>
            <div>
                <label for="email" class="block text-sm font-bold mb-3">メールアドレス</label>
                <input type="email" name="email" id="email" required class="..." value="{{ old('email') }}">
            </div>
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