<x-user-layout>
    <h1 class="font-xl">佐藤のテストページです</h1>
    <p>新着メッセージの通知</p>
    @php
        $unreadMessage = Auth::user()->unreadNotifications->where('type', 'App\\Notifications\\MessageReceived');
    @endphp
    <ul>
        @foreach ($unreadMessage as $row)
            <li>
                <p>{{ $row }}</p>
                <p>{{ $row->data['sender_name'] }}からのメッセージです（{{ $row['created_at'] }}）</p>
                <form method="post" action="{{ route('satoTest.markAsRead') }}">
                    @csrf
                    <input type="hidden" name="notificationId" value="{{ $row->id }}">
                    <button>確認</button>
                </form>
            </li>
        @endforeach
    </ul>
    <p>リクエストの通知</p>
    @php
        $unreadRequestReceived = Auth::user()->unreadNotifications->where(
            'type',
            'App\\Notifications\\RequestReceived',
        );
    @endphp
    <ul>
        @foreach ($unreadRequestReceived as $row)
            <li>
                <p>{{ $row }}</p>
                <p>新着のリクエストがあります</p>
                <form method="post" action="{{ route('satoTest.markAsRead') }}">
                    @csrf
                    <input type="hidden" name="notificationId" value="{{ $row->id }}">
                    <button>確認</button>
                </form>
            </li>
        @endforeach
    </ul>
    <p>リクエスト承認の通知</p>
    @php
        $unreadRequestAccepted = Auth::user()->unreadNotifications->where(
            'type',
            'App\\Notifications\\RequestAccepted',
        );
    @endphp
    @foreach ($unreadRequestAccepted as $row)
        <li>
            <p>{{ $row }}</p>
            <p>リクエストが承認されました</p>
            <form method="post" action="{{ route('satoTest.markAsRead') }}">
                @csrf
                <input type="hidden" name="notificationId" value="{{ $row->id }}">
                <button>確認</button>
            </form>
        </li>
    @endforeach
</x-user-layout>
