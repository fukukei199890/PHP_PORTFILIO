<x-user-layout>
    <div>
        <h1 class="text-3xl text-center font-bold mb-4">
            お問い合わせ
        </h1>
        <hr class="border-t border-gray-300 mb-6">
        <p class="mb-2">
            サービスに関するお問い合わせは、以下のフォームよりご連絡ください。
        </p>
        <p class="mb-2">当社サービスに関するご質問・ご相談は、下記フォームよりお問い合わせください。 内容確認後、担当よりご連絡いたします。</p>
        <p class="mb-4">※通常2〜3営業日以内にご返信いたします。 
            <br>※内容によっては回答いたしかねる場合がございます。
        </p>


        <form method="" action="#">

            <div class="mb-4 text-center">
                <div class="mb-4 text-xl font-bold">
                    <label for="message">お問い合わせ内容</label>
                </div>
                <textarea id="message" name="message" rows="5" required class="w-full"></textarea>
            </div>

            <div class="mb-4 text-right">
                <button type="submit" class="font-mono rounded-full bg-blue-600 text-white p-4 ">
                    送信する
                </button>
            </div>
        </form>
    </div>
</x-user-layout>
