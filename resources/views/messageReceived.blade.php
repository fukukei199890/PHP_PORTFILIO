<x-user-layout>
    <ul>
        @foreach (Auth::user()->unreadNotifications as $notification)
            <li>
                <p>{{ $notification->data['sender_name'] }}からのメッセージがあります</p>
                <form method="post" action="{{ route('messageReceived.read', $notification->id) }}">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="sender_id" value="{{ $notification->data['sender_id'] }}">
                    <button type="submit">
                        確認
                    </button>
                </form>
            </li>
        @endforeach
    </ul>
</x-user-layout>
