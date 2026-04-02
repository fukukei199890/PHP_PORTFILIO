<x-user-layout>
    <div class="max-w-2xl mx-auto p-4">
        <!-- 各ページタイトル -->
        <x-section-title>通知一覧</x-section-title>

        <ul class="space-y-4 mb-6">
            @php
                $unreadMessage = Auth::user()->unreadNotifications->where(
                    'type',
                    'App\\Notifications\\MessageReceived',
                );
            @endphp
            @foreach ($unreadMessage as $notification)
                <li class="flex items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                    <p class="text-gray-700">
                        <span class="font-bold">{{ $notification->data['sender_name'] }}</span>からのメッセージがあります
                    </p>

                    <form method="post" action="{{ route('messageReceived.read', $notification->id) }}" class="m-0">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="sender_id" value="{{ $notification->data['sender_id'] }}">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm transition-colors">
                            確認
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</x-user-layout>
