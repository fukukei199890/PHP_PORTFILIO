<x-user-layout>
    <ul>
        @foreach ($tradeRequests as $row)
            <!-- リクエストid -->
            <p>リクエストID:{{ $row->id }}</p>
            <!-- リクエスト者名 -->
            <p>リクエスト者:{{ $row->user->name }}</p>
            {{-- 出品物名 --}}
            <p>{{ $row->listed_item->series_name }}</p>
            <p>{{ $row->listed_item->char_name }}</p>
            {{-- リクエストメッセージ --}}
            <p>メッセージ:{{ $row->request_message }}</p>
            <form method="get" action="{{ route('requestanswer') }}">
                <input type="hidden" name="request_id" value="{{ $row->id }}">
                <button name="submit">リクエストを受ける</button>
            </form>
        @endforeach
    </ul>
</x-user-layout>
