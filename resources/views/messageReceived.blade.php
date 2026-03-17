<x-user-layout>
    <ul>
        @foreach (Auth::user()->unreadNotifications as $notification)
            <li>
                <p>{{ $notification->data['sender_name'] }}からのメッセージがあります</p>
                <form method="post" action="{{ 'messageReceived.read', $notification->id }}">
                    @csrf
                    @method('PATCH')
                    <button type="submit">
                        確認
                    </button>
                </form>
            </li>
        @endforeach
    </ul>
</x-user-layout>
