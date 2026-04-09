<x-user-layout>
    <div class="max-w-2xl mx-auto py-8 px-6 text-gray-700 leading-relaxed">
        <x-section-title>ご利用ガイド</x-section-title>

        <div class="bg-blue-50 p-5 rounded-xl mb-10 shadow-sm border border-blue-100">
            <p class="text-sm md:text-base text-blue-900 font-medium mb-2">
                「せっかく回したのにダブってしまった……」
            </p>
            <p class="text-sm md:text-base text-gray-700">
                そんなガチャガチャを交換して、みんなでワクワクを共有しましょう！<br>
                <span class="font-bold text-blue-700">お金のやり取りは不要。</span>指定の場所で待ち合わせて、直接手渡しで交換するシンプルな仕組みです。
            </p>
        </div>
        <p class="mt-8 text-xs text-gray-400 italic border-t pt-4 text-center">
            ※こちらは開発環境用デモ画面のため、実際の表示とは異なる場合があります。
        </p>

        <h3 class="text-md font-bold mb-6 flex items-center text-gray-800">
            <span class="bg-blue-600 w-1.5 h-6 mr-2 rounded-full"></span>欲しい商品を探して交換する
        </h3>

        <div class="space-y-10 mb-16">
            <section>
                <div class="flex items-center mb-3">
                    <span class="bg-blue-600 text-white rounded-full min-w-[24px] h-6 flex items-center justify-center mr-3 font-bold text-xs">1</span>
                    <h3 class="text-base md:text-lg font-semibold text-gray-800">欲しい商品を探す</h3>
                </div>
                <p class="mb-4 text-xs md:text-sm text-gray-600 ml-9">「探す」ページから、あなたが今探しているシリーズやキャラクターを検索しましょう。</p>
                <div class="border rounded-xl overflow-hidden shadow-sm ml-9 max-w-sm">
                    <img src="{{ asset('images/manual1.png') }}" alt="検索画面の操作" class="w-full h-auto">
                </div>
            </section>

            <section>
                <div class="flex items-center mb-3">
                    <span class="bg-blue-600 text-white rounded-full min-w-[24px] h-6 flex items-center justify-center mr-3 font-bold text-xs">2</span>
                    <h3 class="text-base md:text-lg font-semibold text-gray-800">交換を申し込む</h3>
                </div>
                <p class="mb-4 text-xs md:text-sm text-gray-600 ml-9">条件に合うユーザーを見つけたら、詳細画面から交換のリクエストを送ります。</p>
                <div class="border rounded-xl overflow-hidden shadow-sm ml-9 max-w-sm">
                    <img src="{{ asset('images/manual2.png') }}" alt="交換リクエストの開始" class="w-full h-auto">
                </div>
            </section>

            <section>
                <div class="flex items-center mb-3">
                    <span class="bg-blue-600 text-white rounded-full min-w-[24px] h-6 flex items-center justify-center mr-3 font-bold text-xs">3</span>
                    <h3 class="text-base md:text-lg font-semibold text-gray-800">リクエストを送信する</h3>
                </div>
                <p class="mb-4 text-xs md:text-sm text-gray-600 ml-9 leading-relaxed">提示する商品を選択し、商品の状態がわかる画像とメッセージを添えて申請を送信しましょう。</p>
                <div class="border rounded-xl overflow-hidden shadow-sm ml-9 max-w-sm">
                    <img src="{{ asset('images/manual3.png') }}" alt="交換リクエストの送信" class="w-full h-auto">
                </div>
            </section>
        </div>

        <h3 class="text-md font-bold mb-6 flex items-center text-gray-800">
            <span class="bg-green-600 w-1.5 h-6 mr-2 rounded-full"></span>商品を出品する
        </h3>

        <div class="space-y-10 mb-16">
            <section>
                <div class="flex items-center mb-3">
                    <span class="bg-green-600 text-white rounded-full min-w-[24px] h-6 flex items-center justify-center mr-3 font-bold text-xs">1</span>
                    <h3 class="text-base md:text-lg font-semibold text-gray-800">商品情報を登録する</h3>
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
                <div class="flex items-center mb-3">
                    <span class="bg-green-600 text-white rounded-full min-w-[24px] h-6 flex items-center justify-center mr-3 font-bold text-xs">2</span>
                    <h3 class="text-base md:text-lg font-semibold text-gray-800">リクエストを待つ</h3>
                </div>
                <p class="mb-4 text-xs md:text-sm text-gray-600 ml-9">出品が完了したら、他のユーザーから交換リクエストが届くのを待ちましょう。</p>
                <div class="border rounded-xl overflow-hidden shadow-sm ml-9 max-w-sm">
                    <img src="{{ asset('images/manual5.png') }}" alt="リクエスト待機画面" class="w-full h-auto">
                </div>
            </section>
        </div>

        <h3 class="text-md font-bold mb-6 flex items-center text-gray-800">
            <span class="bg-orange-500 w-1.5 h-6 mr-2 rounded-full"></span>リクエストが届いたら
        </h3>

        <div class="space-y-10">
            <section>
                <div class="flex items-center mb-3">
                    <span class="bg-orange-500 text-white rounded-full min-w-[24px] h-6 flex items-center justify-center mr-3 font-bold text-xs">1</span>
                    <h3 class="text-base md:text-lg font-semibold text-gray-800">リクエストを確認する</h3>
                </div>
                <div class="mb-4 text-xs md:text-sm text-gray-600 ml-9 space-y-4">
                    <p>リクエストが届くと、画面下部のメニュー（<span class="font-bold">✉アイコン</span>）に件数が表示されます。</p>
                    <div class="border rounded-xl overflow-hidden shadow-sm max-w-sm">
                        <img src="{{ asset('images/manual6-0.png') }}" alt="リクエスト確認" class="w-full h-auto">
                    </div>
                    <p>クリックして、相手が提示している商品の写真や情報を確認しましょう。</p>
                    <div class="border rounded-xl overflow-hidden shadow-sm max-w-sm">
                        <img src="{{ asset('images/manual6.png') }}" alt="リクエスト詳細" class="w-full h-auto">
                    </div>
                </div>
            </section>

            <section>
                <div class="flex items-center mb-3">
                    <span class="bg-orange-500 text-white rounded-full min-w-[24px] h-6 flex items-center justify-center mr-3 font-bold text-xs">2</span>
                    <h3 class="text-base md:text-lg font-semibold text-gray-800">交換を承認する</h3>
                </div>
                <p class="mb-4 text-xs md:text-sm text-gray-600 ml-9">内容に納得できたら「この内容で交換する」ボタンを押下し、取引を開始します。</p>
                <div class="border rounded-xl overflow-hidden shadow-sm ml-9 max-w-sm">
                    <img src="{{ asset('images/manual7.png') }}" alt="承認画面" class="w-full h-auto">
                </div>
            </section>

            <section>
                <div class="flex items-center mb-3">
                    <span class="bg-orange-500 text-white rounded-full min-w-[24px] h-6 flex items-center justify-center mr-3 font-bold text-xs">3</span>
                    <h3 class="text-base md:text-lg font-semibold text-gray-800">メッセージで相談する</h3>
                </div>
                <p class="mb-4 text-xs md:text-sm text-gray-600 ml-9">専用のチャット画面で、挨拶や待ち合わせ場所・日時を相談してください。</p>
                <div class="mt-4 mb-4 text-xs md:text-sm text-gray-600 ml-9 bg-gray-50 p-3 rounded-lg border-l-2 border-gray-300">
                    <p><strong>💡 通知について</strong><br>返信が届くと、画面下部の<span class="font-bold">🔔アイコン</span>に通知が表示されます。</p>
                </div>
                <div class="border rounded-xl overflow-hidden shadow-sm ml-9 max-w-sm">
                    <img src="{{ asset('images/manual9.png') }}" alt="通知の確認" class="w-full h-auto">
                </div>
            </section>

            <section>
                <div class="flex items-center mb-3">
                    <span class="bg-orange-500 text-white rounded-full min-w-[24px] h-6 flex items-center justify-center mr-3 font-bold text-xs">4</span>
                    <h3 class="text-base md:text-lg font-semibold text-gray-800">取引を完了する<span class="text-sm font-normal ml-1">(出品者のみ)</span></h3>
                </div>
                <p class="mb-4 text-xs md:text-sm text-gray-600 ml-9">無事に手渡しが終わったら、「取引を完了する」ボタンを押してください。<br><span class="text-[10px]">※リクエスト申請側には表示されません。</span></p>
                <div class="border rounded-xl overflow-hidden shadow-sm ml-9 max-w-sm">
                    <img src="{{ asset('images/manual11.png') }}" alt="完了ボタン" class="w-full h-auto">
                </div>
            </section>
        </div>

        <div class="mt-16 p-6 bg-gray-50 rounded-xl border border-gray-200 text-xs">
            <h4 class="font-bold mb-3 text-gray-800 flex items-center italic">
                <span class="mr-2">💡</span> スムーズな交換のために
            </h4>
            <ul class="list-disc ml-4 space-y-1 text-gray-600 leading-tight">
                <li>本サービスでの金銭のやり取りは<span class="text-red-600 font-bold">一切禁止</span>です。</li>
                <li>待ち合わせ場所や日時は、チャット機能にて誠実に相談してください。</li>
                <li>手渡し時は、公共の場など安全な場所を選んでください。</li>
            </ul>
        </div>

        <div class="mt-16 pt-10 border-t border-gray-200">
            <x-section-title>その他の機能</x-section-title>

            <div class="space-y-16">
                <section>
                    <div class="flex items-center mb-3">
                        <span class="bg-blue-500 text-white rounded-full min-w-[24px] h-6 flex items-center justify-center mr-3 font-bold text-xs">A</span>
                        <h3 class="text-lg font-semibold text-gray-800">出品・取引完了の確認</h3>
                    </div>
                    <p class="mb-4 text-xs md:text-sm text-gray-600 ml-9 leading-relaxed">
                        マイページの「出品中」「取引完了」から各アイテム情報が確認できます。アイテムの削除もここから可能です。
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 ml-9 max-w-xl">
                        <div class="border rounded-xl overflow-hidden shadow-sm">
                            <img src="{{ asset('images/manual13.png') }}" alt="マイページ確認" class="w-full h-auto">
                        </div>
                        <div class="border rounded-xl overflow-hidden shadow-sm">
                            <img src="{{ asset('images/manual14.png') }}" alt="アイテム削除" class="w-full h-auto">
                        </div>
                    </div>
                </section>

                <section>
                    <div class="flex items-center mb-3">
                        <span class="bg-blue-500 text-white rounded-full min-w-[24px] h-6 flex items-center justify-center mr-3 font-bold text-xs">B</span>
                        <h3 class="text-lg font-semibold text-gray-800">お気に入り登録</h3>
                    </div>
                    <p class="mb-4 text-xs md:text-sm text-gray-600 ml-9 leading-relaxed">
                        商品詳細ページの <span class="text-red-500">❤</span> ボタンをタップしてお気に入り登録（ログイン中のみ）。登録したアイテムはマイページから確認できます。
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 ml-9 max-w-xl">
                        <div class="border rounded-xl overflow-hidden shadow-sm">
                            <img src="{{ asset('images/manual15.png') }}" alt="詳細ページで❤" class="w-full h-auto">
                        </div>
                        <div class="border rounded-xl overflow-hidden shadow-sm">
                            <img src="{{ asset('images/manual16.png') }}" alt="マイページお気に入り一覧" class="w-full h-auto">
                        </div>
                    </div>
                </section>

                <section>
                    <div class="flex items-center mb-3">
                        <span class="bg-blue-500 text-white rounded-full min-w-[24px] h-6 flex items-center justify-center mr-3 font-bold text-xs">C</span>
                        <h3 class="text-lg font-semibold text-gray-800">通知機能の活用</h3>
                    </div>
                    <p class="mb-4 text-xs md:text-sm text-gray-600 ml-9 leading-relaxed">
                        トップページ右上の「通知」からメッセージやリクエストの状況を確認できます。確認ボタンを押すと詳細ページへ遷移します。
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 ml-9 max-w-xl">
                        <div class="border rounded-xl overflow-hidden shadow-sm">
                            <img src="{{ asset('images/manual17.png') }}" alt="通知アイコン" class="w-full h-auto">
                        </div>
                        <div class="border rounded-xl overflow-hidden shadow-sm">
                            <img src="{{ asset('images/manual18.png') }}" alt="通知内容確認" class="w-full h-auto">
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-user-layout>