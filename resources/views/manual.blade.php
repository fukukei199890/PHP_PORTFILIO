<x-user-layout>
    <div class="max-w-2xl mx-auto py-8 px-6 text-gray-700 leading-relaxed">
        <h2 class="text-2xl font-bold mb-6 border-b pb-2 text-center text-blue-600 text-lg md:text-2xl">ご利用ガイド</h2>

        <div class="bg-blue-50 p-5 rounded-xl mb-10 shadow-sm border border-blue-100">
            <p class="text-sm md:text-base text-blue-900 font-medium mb-2">
                「せっかく回したのにダブってしまった……」
            </p>
            <p class="text-sm md:text-base text-gray-700">
                そんなガチャガチャを交換して、みんなでワクワクを共有しましょう！<br>
                <span class="font-bold text-blue-700">お金のやり取りは不要。</span>指定の場所で待ち合わせて、直接手渡しで交換するシンプルな仕組みです。
            </p>
        </div>

        <h3 class="text-md font-bold mb-6 flex items-center text-gray-800">
            <span class="bg-blue-600 w-1.5 h-6 mr-2 rounded-full"></span>欲しい商品を探して交換する
        </h3>

        <div class="space-y-10 mb-16">
            <section>
                <div class="flex items-center mb-3">
                    <span class="bg-blue-600 text-white rounded-full min-w-[24px] h-6 flex items-center justify-center mr-3 font-bold text-xs">1</span>
                    <h3 class="text-lg font-semibold text-gray-800 text-base md:text-lg">欲しい商品を探す</h3>
                </div>
                <p class="mb-4 text-xs md:text-sm text-gray-600 ml-9">「探す」ページから、あなたが今探しているシリーズやキャラクターを検索しましょう。</p>
                <div class="border rounded-xl overflow-hidden shadow-sm ml-9 max-w-sm">
                    <img src="{{ asset('images/manual1.png') }}" alt="検索画面の操作" class="w-full h-auto">
                </div>
            </section>

            <section>
                <div class="flex items-center mb-3">
                    <span class="bg-blue-600 text-white rounded-full min-w-[24px] h-6 flex items-center justify-center mr-3 font-bold text-xs">2</span>
                    <h3 class="text-lg font-semibold text-gray-800 text-base md:text-lg">交換を申し込む</h3>
                </div>
                <p class="mb-4 text-xs md:text-sm text-gray-600 ml-9">条件に合うユーザーを見つけたら、詳細画面から交換のリクエストを送ります。</p>
                <div class="border rounded-xl overflow-hidden shadow-sm ml-9 max-w-sm">
                    <img src="{{ asset('images/manual2.png') }}" alt="交換リクエストの開始" class="w-full h-auto">
                </div>
            </section>

            <section>
                <div class="flex items-center mb-3">
                    <span class="bg-blue-600 text-white rounded-full min-w-[24px] h-6 flex items-center justify-center mr-3 font-bold text-xs">3</span>
                    <h3 class="text-lg font-semibold text-gray-800 text-base md:text-lg text-sm md:text-base">リクエストを送信する</h3>
                </div>
                <p class="mb-4 text-xs md:text-sm text-gray-600 ml-9 leading-relaxed">提示する商品を選択し、商品の状態がわかる画像とメッセージを添えて申請を送信しましょう。完了すると、相手ユーザーに通知が届きます。</p>
                <div class="border rounded-xl overflow-hidden shadow-sm ml-9 max-w-sm">
                    <img src="{{ asset('images/manual3.png') }}" alt="交換リクエストの送信" class="w-full h-auto">
                </div>
            </section>
        </div>

        <h3 class="text-md font-bold mb-6 flex items-center text-gray-800">
            <span class="bg-green-600 w-1.5 h-6 mr-2 rounded-full"></span>商品を出品する
        </h3>

        <div class="space-y-10">
            <section>
                <div class="flex items-center mb-3">
                    <span class="bg-green-600 text-white rounded-full min-w-[24px] h-6 flex items-center justify-center mr-3 font-bold text-xs">1</span>
                    <h3 class="text-lg font-semibold text-gray-800 text-base md:text-lg">商品情報を登録する</h3>
                </div>
                <div class="mb-4 text-xs md:text-sm text-gray-600 ml-9">
                    「出品」ページから、お手元のダブった商品を登録します。
                    <div class="mt-3 p-3 bg-yellow-50 border-l-2 border-yellow-400 text-[11px] md:text-xs leading-5">
                        <strong class="text-yellow-700">【商品状態の目安】</strong><br>
                        ・<span class="font-bold">未開封</span>：カプセルからは出しているが、内袋は開けていない状態<br>
                        ・<span class="font-bold">開封済</span>：内袋からも取り出している状態
                    </div>
                </div>
                <div class="border rounded-xl overflow-hidden shadow-sm ml-9 max-w-sm">
                    <img src="{{ asset('images/manual4.png') }}" alt="出品画面の操作" class="w-full h-auto">
                </div>
            </section>

            <section>
                <div class="flex items-center mb-4">
                    <span class="bg-green-600 text-white rounded-full w-6 h-6 flex items-center justify-center mr-3 font-bold text-xs">2</span>
                    <h3 class="text-xl font-semibold">リクエストを待つ</h3>
                </div>
                <p class="mb-4 text-sm md:text-base">出品が完了したら、他のユーザーから交換リクエストが届くのを待ちましょう。</p>
                <div class="border rounded-xl overflow-hidden shadow-sm">
                    <img src="{{ asset('images/manual5.png') }}" alt="リクエスト待機画面" class="w-full h-auto">
                </div>
            </section>
        </div>
        <h3 class="text-md font-bold mb-6 mt-16 flex items-center text-gray-800">
            <span class="bg-orange-500 w-1.5 h-6 mr-2 rounded-full"></span>リクエストが届いたら
        </h3>

        <div class="space-y-10">
            <section>
                <div class="flex items-center mb-3">
                    <span class="bg-orange-500 text-white rounded-full min-w-[24px] h-6 flex items-center justify-center mr-3 font-bold text-xs">1</span>
                    <h3 class="text-lg font-semibold text-gray-800 text-base md:text-lg">リクエストを確認する</h3>
                </div>
                <div class="mb-4 text-xs md:text-sm text-gray-600 ml-9 leading-relaxed">
                    リクエストが届くと、画面下部のメニュー（<span class="font-bold">✉アイコン</span>）に件数が表示されます。<br>
                    クリックして、相手が提示している商品の写真や情報を確認しましょう。
                </div>
                <div class="border rounded-xl overflow-hidden shadow-sm ml-9 max-w-sm">
                    <img src="{{ asset('images/manual6.png') }}" alt="リクエスト確認画面" class="w-full h-auto">
                </div>
            </section>

            <section>
                <div class="flex items-center mb-3">
                    <span class="bg-orange-500 text-white rounded-full min-w-[24px] h-6 flex items-center justify-center mr-3 font-bold text-xs">2</span>
                    <h3 class="text-lg font-semibold text-gray-800 text-base md:text-lg">交換を承認する</h3>
                </div>
                <p class="mb-4 text-xs md:text-sm text-gray-600 ml-9">内容に納得できたら「この内容で交換する」ボタンを押下し、取引を開始します。</p>
                <div class="border rounded-xl overflow-hidden shadow-sm ml-9 max-w-sm">
                    <img src="{{ asset('images/manual7.png') }}" alt="承認画面" class="w-full h-auto">
                </div>
            </section>

            <section>
                <div class="flex items-center mb-3">
                    <span class="bg-orange-500 text-white rounded-full min-w-[24px] h-6 flex items-center justify-center mr-3 font-bold text-xs">3</span>
                    <h3 class="text-lg font-semibold text-gray-800 text-base md:text-lg">メッセージで相談する</h3>
                </div>
                <p class="mb-4 text-xs md:text-sm text-gray-600 ml-9">専用のチャット画面が開きます。まずは挨拶をして、待ち合わせ場所や日時を相談しましょう。</p>
                <div class="border rounded-xl overflow-hidden shadow-sm ml-9 max-w-sm">
                    <img src="{{ asset('images/manual8.png') }}" alt="チャット画面" class="w-full h-auto">
                </div>

                <div class="mt-4 mb-4 text-xs md:text-sm text-gray-600 ml-9 bg-gray-50 p-3 rounded-lg border-l-2 border-gray-300">
                    <p><strong>💡 通知について</strong><br>
                        相手から返信が届くと、画面下部の<span class="font-bold">🔔アイコン</span>に通知が表示されます。こまめにチェックしましょう。</p>
                </div>
                <div class="border rounded-xl overflow-hidden shadow-sm ml-9 max-w-sm">
                    <img src="{{ asset('images/manual10.png') }}" alt="通知の確認" class="w-full h-auto">
                </div>
            </section>

            <section>
                <div class="flex items-center mb-3">
                    <span class="bg-orange-500 text-white rounded-full min-w-[24px] h-6 flex items-center justify-center mr-3 font-bold text-xs">4</span>
                    <h3 class="text-lg font-semibold text-gray-800 text-base md:text-lg">取引を完了する</h3>
                </div>
                <p class="mb-4 text-xs md:text-sm text-gray-600 ml-9 text-sm">無事に手渡しでの交換が終わったら、「取引を完了する」ボタンを押してください。</p>
                <div class="border rounded-xl overflow-hidden shadow-sm ml-9 max-w-sm">
                    <img src="{{ asset('images/manual11.png') }}" alt="完了ボタン" class="w-full h-auto">
                </div>
            </section>

            <section>
                <div class="flex items-center mb-3">
                    <span class="bg-orange-500 text-white rounded-full min-w-[24px] h-6 flex items-center justify-center mr-3 font-bold text-xs">5</span>
                    <h3 class="text-lg font-semibold text-gray-800 text-base md:text-lg">相手を評価する</h3>
                </div>
                <p class="mb-4 text-xs md:text-sm text-gray-600 ml-9 text-sm">最後に「はい」を選択し、相手の評価を入力して全ての取引が終了となります。</p>
                <div class="border rounded-xl overflow-hidden shadow-sm ml-9 max-w-sm">
                    <img src="{{ asset('images/manual12.png') }}" alt="評価画面" class="w-full h-auto">
                </div>
            </section>
        </div>

        <div class="mt-16 p-6 bg-gray-50 rounded-xl border border-gray-200 text-xs">
            <h4 class="font-bold mb-3 text-gray-800 flex items-center italic">
                <span class="mr-2">💡</span> スムーズな交換のために
            </h4>
            <ul class="list-disc ml-4 space-y-1 text-gray-600 leading-tight">
                <li>本サービスでの金銭のやり取りは<span class="text-red-600 font-bold">一切禁止</span>です。</li>
                <li>待ち合わせ場所や日時は、マッチング後のチャット機能にて誠実に相談してください。</li>
                <li>手渡し時は、公共の場など安全な場所を選んでください。</li>
            </ul>
        </div>

    </div>
</x-user-layout>