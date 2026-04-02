<x-user-layout>
    <h1 class="">通知一覧</h1>
    <h2 class="">新着メッセージの通知</h2>
    @php
        $unreadMessage = Auth::user()->unreadNotifications->where('type', 'App\\Notifications\\MessageReceived');
    @endphp
    <ul>
        @foreach ($unreadMessage as $row)
            <li>
                <p>{{ $row->data['sender_name'] ?? '不明なユーザー' }}さんからのメッセージです（{{ $row['created_at'] }}）</p>
                <form method="post" action="{{ route('notification.markAsRead') }}">
                    @csrf
                    <input type="hidden" name="notificationId" value="{{ $row->id }}">
                    <button>確認する</button>
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
                <p></p>
                <p>{{ $row->sender->name ?? '不明なユーザー' }}さんから新着のリクエストがあります（{{ $row->created_at }}）</p>
                <form method="post" action="{{ route('notification.markAsRead') }}">
                    @csrf
                    <input type="hidden" name="notificationId" value="{{ $row->id }}">
                    <button>確認する</button>
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
    <ul>
        @foreach ($unreadRequestAccepted as $row)
            <li>
                <p>{{ $row->sender->name ?? '不明なユーザー' }}さんへのリクエストが承認されました（{{ $row->created_at }}）</p>
                <form method="post" action="{{ route('notification.markAsRead') }}">
                    @csrf
                    <input type="hidden" name="notificationId" value="{{ $row->id }}">
                    <button>確認</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-user-layout>
