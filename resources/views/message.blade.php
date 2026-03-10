<x-user-layout>
    {{ $thread_id }}
    <ul>
        @foreach ($message_data as $row)
            @if($row->user_id==Auth::user()->id)
            <div>
                <p>{{$row->user_id}}</p>
                <p>メッセージ:{{$row->message_text}}</p>
                <br>
            </div>
            @else
            <div class="bg-blue-600">
                <p>{{$row->user_id}}</p>
                <p>メッセージ:{{$row->message_text}}</p>
                <br>
            </div>
            @endif
        @endforeach
    </ul>
    {{-- メッセージの書き込み --}}
    <form method="post" action="{{ route('create_message') }}">
        @csrf
        <p>メッセージ</p>
        <input type="text" name="message_text">
        <button type="submit" name="submit">送信</button>
    </form>
</x-user-layout>