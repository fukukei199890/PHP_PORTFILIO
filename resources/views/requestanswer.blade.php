<x-user-layout>
    @isset($requestData)
        <div>
            <!-- ユーザー名 -->
            <p>{{ $requestData->user->name }}</p>
            <!-- スコア -->
            <p>{{ $score }}</p>
            {{-- 自分のアイテム --}}
            <p>自分のアイテム</p>
            <p>{{ $requestData->listed_item->series_name }}</p>
            <p>{{ $requestData->listed_item->char_name }}</p>
            <!-- リクエスト側のアイテム -->
            <p>相手のアイテム
            <p>
            <p>{{ $requestData->request_series }}</p>
            <p>{{ $requestData->request_char }}</p>
            <!-- リクエスト文 -->
            <p>{{ $requestData->requestMessage }}</P>
        </div>

        <!-- <div class="min-h-screen bg-gray-100 flex flex-col justify-between">
                                                            <p>お相手が見つかりました</p>
                                                            {{-- 中央エリア --}}
                                                            <div class="flex flex-1 items-center justify-center px-6 pb-24">

                                                                {{-- カード --}}
                                                                <div class="bg-[#e8dddd] border border-[#c9a9a9] 
                    rounded-[40px] 
                    w-full max-w-md 
                    p-10 text-center shadow-sm">

                                                                    {{-- フォーム --}}
                                                                    <!-- route関数はエイリアス（別名）phpのasみたいなもので指定してそのURLを呼び出す -->
        <form method="get" action="{{ route('requestanswer.make_match') }}" class="space-y-6">

            {{-- はい --}}
            <button type="submit" name="action"
                class="w-40 py-3 
                               bg-gray-200 border border-black 
                               rounded-xl 
                               hover:bg-gray-300 transition">
                交換する
            </button>

        </form>

        <form method="post" action="{{ route('requestanswer.make_match') }}" class="space-y-6">
            @csrf
            {{-- いいえ --}}
            <button type="submit" name="action" value="no"
                class="w-40 py-3 
                               bg-gray-200 border border-black 
                               rounded-xl 
                               hover:bg-gray-300 transition">
                キャンセルする
            </button>
        </form>
    @else
        <p>リクエストデータが存在しません</p>
    @endisset
</x-user-layout>
