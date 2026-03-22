<x-user-layout>
    <div class="max-w-2xl mx-auto py-8 px-6 text-gray-700 leading-relaxed">
        <h2 class="text-2xl font-bold mb-4 border-b pb-2 text-center">ご利用ガイド</h2>

        <div class="bg-blue-50 p-4 rounded-lg mb-8">
            <p class="text-sm">
                「せっかく回したのにダブってしまった…」<br>
                このサービスは、そんなガチャガチャを交換し、無駄をなくして楽しむための場所です。
            </p>
        </div>

        <div class="space-y-12">
            <section>
                <div class="flex items-center mb-4">
                    <span class="bg-blue-600 text-white rounded-full w-2 h-2 flex items-center justify-center mr-3 font-bold">1</span>
                    <h3 class="text-xl font-semibold">欲しい商品を探す</h3>
                </div>
                <p class="mb-4 text-sm md:text-base">「探す」ページから、あなたが今探しているシリーズやキャラクターを検索しましょう。</p>
                <div class="border rounded-xl overflow-hidden shadow-sm">
                    <img src="{{ asset('images/manual1.png') }}" alt="検索画面の操作" class="w-full h-auto">
                </div>
            </section>

            <section>
                <div class="flex items-center mb-4">
                    <span class="bg-blue-600 text-white rounded-full w-2 h-2 flex items-center justify-center mr-3 font-bold">2</span>
                    <h3 class="text-xl font-semibold">交換を申し込む</h3>
                </div>
                <p class="mb-4 text-sm md:text-base">条件に合うユーザーを見つけたら、自分が持っている交換用商品を選択してリクエストを送ります。</p>
                <div class="border rounded-xl overflow-hidden shadow-sm">
                    <img src="{{ asset('images/manual2.png') }}" alt="交換リクエストの送信" class="w-full h-auto">
                </div>
            </section>

            <section>
                <div class="flex items-center mb-4">
                    <span class="bg-blue-600 text-white rounded-full w-2 h-2 flex items-center justify-center mr-3 font-bold">2</span>
                    <h3 class="text-xl font-semibold">商品を選択しリクエストを送る</h3>
                </div>
                <p class="mb-4 text-sm md:text-base">提示する商品を選択後、画像とメッセージを入力後、申請を送信します。<br>
                    送信が完了したら相手ユーザーにリクエストが送られます。</p>
                <div class="border rounded-xl overflow-hidden shadow-sm">
                    <img src="{{ asset('images/manual3.png') }}" alt="交換リクエストの送信" class="w-full h-auto">
                </div>
            </section>


        </div>

        <div class="mt-12 p-6 bg-gray-100 rounded-lg text-xs">
            <h4 class="font-bold mb-2">💡 スムーズな交換のために</h4>
            <p>※金銭のやり取りは禁止です。受け渡しは、マッチング後のチャットで相談してください。</p>
        </div>
    </div>
</x-user-layout>