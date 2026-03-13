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

        {{-- はい --}}
        <form method="post" action="{{ route('requestanswer.make_match') }}" class="space-y-6">
            @csrf
            <input type="hidden" name="request_id" value="{{ $requestData->id }}">
            <button type="submit" name="action"
                class="w-40 py-3 
                               bg-gray-200 border border-black 
                               rounded-xl 
                               hover:bg-gray-300 transition">
                交換する
            </button>

        </form>

        {{-- いいえ --}}
        <form method="post" action="{{ route('requestanswer.make_match') }}" class="space-y-6">
            @csrf
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
