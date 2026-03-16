<x-user-layout>
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>交換確認画面</title>
    </head>

    <body>

        <div class="min-h-screen bg-gray-100 flex flex-col justify-between">

            {{-- 中央エリア --}}
            <div class="flex flex-1 items-center justify-center px-6 pb-24">

                {{-- カード --}}
                <div
                    class="bg-[#FFFFFF] border border-[#FFFFFF] 
                    rounded-[40px] 
                    w-full max-w-md 
                    p-10 text-center shadow-sm">

                    <h2 class="text-2xl font-semibold mb-10 leading-relaxed">
                        交換を完了して<br>
                        よろしいですか？
                    </h2>

                    {{-- フォーム --}}
                    <!-- route関数はエイリアス（別名）phpのasみたいなもので指定してそのURLを呼び出す -->
                    <form method="get" action="{{ route('rating') }}" class="space-y-6">
                        @csrf
                        {{-- はい --}}
                        <input type="hidden" name="thread_id" value="{{ $thread_id }}">
                        <button type="submit" name="action" value="yes"
                            class="w-40 py-3 bg-blue-500 text-white py-3 rounded-full font-semibold hover:bg-blue-600 border border-white">
                                はい
                        </button>

                    </form>

                    <form method="get" action="{{ route('message') }}" class="space-y-6">
                        {{-- いいえ --}}
                        <button type="submit" name="action" value="no"
                            class="w-40 py-3 bg-blue-500 text-white py-3 rounded-full font-semibold hover:bg-blue-600 border border-white">
                            いいえ
                        </button>
                    </form>

                </div>
            </div>

        </div>

    </body>

    </html>

</x-user-layout>
