<x-user-layout>
    @isset($message_data)
        <ul>
            @foreach ($message_data as $row)
                @if ($row->user_id == Auth::user()->id)
                    <div>
                        <p>{{ $row->user_id }}</p>
                        <p>メッセージ:{{ $row->message_text }}</p>
                        <br>
                    </div>
                @else
                    <div class="bg-blue-600">
                        <p>{{ $row->user_id }}</p>
                        <p>メッセージ:{{ $row->message_text }}</p>
                        <br>
                    </div>
                @endif
            @endforeach
        </ul>
    @else
        <p>メッセージを書き込んでください
        @endisset
        {{-- メッセージの書き込み --}}
    <form method="post" action="{{ route('create_message') }}">
        @csrf
        <p>メッセージ</p>
        <input type="hidden" name="thread_id" value="{{ $thread_id }}">
        <input type="text" name="message_text">
        <button type="submit" name="submit">送信</button>
    </form>
    <form method="post" action="{{ route('message.complete') }}">
        @csrf
        <input type="hidden" name="thread_id" value="{{ $thread_id }}">
        <button type="submit" name="complete">取引完了</button>
    </form>
</x-user-layout>
