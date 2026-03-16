<x-user-layout>
    <ul>
        @foreach (Auth::user()->unreadNotifications as $notification)
            <li>{{ $notification->sender_name }}からのメッセージがあります</li>
        @endforeach
    </ul>
</x-user-layout>
